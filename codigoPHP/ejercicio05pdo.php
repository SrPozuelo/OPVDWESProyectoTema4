<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema 4 | Óscar Pozuelo Villamandos</title>
        <link rel="stylesheet" href="../webroot/css/fonts.css">
        <link rel="stylesheet" href="../webroot/css/all.min.css">
        <link rel="stylesheet" href="../webroot/css/estilos.css"> 
        <link rel="stylesheet" href="../webroot/css/estilosTabla.css"> 
    </head>
    <body>
        <header class="cabecera-principal">
            <div class="contenido-cabecera">
                <div class="identidad">
                    <a href="../index.html" style="text-decoration:none;">
                        <div class="logo-iniciales">ÓS</div>
                    </a>
                    <h1>Óscar Pozuelo Villamandos</h1>
                </div>
                <div class="curso-badge" style="background-color: #777BB4; color: white;">
                    Tema 4
                </div>
            </div>
        </header>
        <main id="contenedor">
            <div id="titulo">5-Pagina web que añade tres registros a nuestra tabla Departamento. (Transacciones).</div>
            <?php
                require_once "../conf/ConfDBPDO.php";
                $aNuevosDepartamentos=[
                    [
                        'CodDepartamento'=>'QUI',
                        'DescDepartamento'=>'Departamento de química',
                        'VolumenDeNegocio' =>2352.33
                    ],
                    [
                        'CodDepartamento'=>'HIS',
                        'DescDepartamento'=>'Departamento de historia',
                        'VolumenDeNegocio' =>6990.90
                    ],
                    [
                        'CodDepartamento'=>'MUS',
                        'DescDepartamento'=>'Departamento de música',
                        'VolumenDeNegocio' =>6990.90
                    ]
                ];
                try {
                    $oConexionPDO=new PDO(DSN,USERNAME,PASSWORD);
                    $oConexionPDO->beginTransaction();
                    echo '<p>Iniciando transacción...</p>';
                    // La consulta ahora usa marcadores con nombre (:nombre)
                    $sConsultaSQL="INSERT INTO T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio) VALUES (:codDepto,:descDepto,now(),:volNegocio)";
                    $oSentenciaPreparada = $oConexionPDO->prepare($sConsultaSQL);
                    $sCodDepto;
                    $sDescDepto;
                    $iVolNegocio;
                    //Se vinculan las variables a los marcadores por su nombre
                    $oSentenciaPreparada->bindParam(':codDepto', $sCodDepto);
                    $oSentenciaPreparada->bindParam(':descDepto', $sDescDepto);
                    $oSentenciaPreparada->bindParam(':volNegocio', $iVolNegocio);
                    foreach ($aNuevosDepartamentos as $aDepto) {
                        echo "<h4><b>Intentando insertar:</b></h4>";
                        echo "<p><span class='variable'>Código</span>=<span class='valor'>{$aDepto['CodDepartamento']}</span></p>";
                        echo "<p><span class='variable'>Descripción</span>=<span class='valor'>{$aDepto['DescDepartamento']}</span></p>";
                        echo "<p><span class='variable'>Volumen</span>=<span class='valor'>{$aDepto['VolumenDeNegocio']}</span></p>";
                        $sCodDepto = $aDepto['CodDepartamento'];
                        $sDescDepto = $aDepto['DescDepartamento'];
                        $ivVolNegocio = $aDepto['VolumenDeNegocio'];
                        $oSentenciaPreparada->execute();
                    }
                    $oConexionPDO->commit();
                    echo '<p class="azul">¡ÉXITO! Transacción completada y cambios guardados (COMMIT).</p>';
                }
                catch (PDOException $oExcepcionPDO) {
                    $oConexionPDO->rollBack();
                    echo '<p class="rojo">¡ERROR! Transacción fallida. Se han deshecho todos los cambios (ROLLBACK).</p>';
                    echo '<p><b>Detalle:</b>'.$oExcepcionPDO->getMessage().'</p>';
                }
                finally {
                    unset($oConexionPDO);
                }
                /*
                 * Se muestra el listado de departamentos.
                 */
            ?>
            <h3>Listado actual de los departamentos:</h3>
            <table class="TablaPHP">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción del departamento</th>
                        <th>Fecha de Creación</th>
                        <th>Volumen de Negocio</th>
                        <th>Fecha de Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            $miDB=new PDO(DSN,USERNAME,PASSWORD);
                            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $resultadoConsulta=$miDB->prepare('SELECT * FROM T02_Departamento');
                            $resultadoConsulta->execute();
                            while($oRegistroObject=$resultadoConsulta->fetchObject()){
                                echo '<tr>';
                                echo '<td class="centrado">'.$oRegistroObject->T02_CodDepartamento.'</td>';
                                echo '<td>'.$oRegistroObject->T02_DescDepartamento.'</td>';
                                $oFechaCreacion = new DateTime($oRegistroObject->T02_FechaCreacionDepartamento);
                                echo "<td class='centrado'>".$oFechaCreacion->format("d-m-Y")."</td>";
                                echo '<td class="importe">'.number_format($oRegistroObject->T02_VolumenDeNegocio, 2, ',', '.').'€</td>';
                                if(!is_null($oRegistroObject->T02_FechaBajaDepartamento)){
                                    //si no se pone la condición la fecha no es null
                                    $oFechaBaja = new DateTime($oRegistroObject->T02_FechaBajaDepartamento);
                                    echo '<td>' . $oFechaBaja->format("d-m-Y") . '</td>';
                                }
                                else{
                                    echo '<td>No tiene</td>';
                                }
                                echo '</tr>';
                            }
                            echo '<tr>';
                            echo "<td class='centrado' colspan=5><strong>Número de registros:</strong>".$resultadoConsulta->rowCount()."</td>";
                            echo "</tr>";
                        }
                        catch(PDOException $miExceptionPDO){
                            echo '<p class="rojo"><b>Error:</b>'.$miExceptionPDO->getMessage().'</p>';
                            echo '<p class="rojo"><b>Código de error:</b>'.$miExceptionPDO->getCode().'</p>';
                        }
                        finally{
                            unset($miDB);
                        }
                    ?>
                </tbody>
            </table>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 24-03-2026</p>
                </div>
                <div class="iconos-footer">
                    <a href="https://github.com/SrPozuelo/OPVDWESProyectoTema4" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="../indexProyectoTema4.html" title="Inicio"><i class="fa-solid fa-house"></i></a>
                    <a href="../indexProyectoTema4.html" title="Volver a Tema4"><i class="fa-solid fa-arrow-turn-up"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>