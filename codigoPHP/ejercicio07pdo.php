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
            <div id="titulo">7-Página web que toma datos (código y descripción) de un fichero JSON y los añade a la tabla.</div>
            <?php
                require_once "../conf/ConfDBPDO.php";
                if(!file_exists('../tmp/Departamentos.json')){
                    echo("<h3>El archivo .json no existe.</h3>");
                    echo("<p>Deberías ejecutar el ejercicio 8 antes que este.</p>");
                }
                else{
                    /*Se convierte el JSON en un array de departamentos.*/
                    $Json=file_get_contents('../tmp/Departamentos.json');
                    $aDepartamentos=json_decode($Json,true);
                    try {
                        $miDB=new PDO(DSN,USERNAME,PASSWORD);
                        $miDB->beginTransaction();
                        $sql='INSERT INTO T02_Departamento VALUES(:CodDepartamento,:DescDepartamento,:FechaCreacionDepartamento,:VolumenDeNegocio,:FechaBajaDepartamento)';
                        $Consulta=$miDB->prepare($sql);
                        /*Se insertan los departamentos en la base de datos.*/
                        foreach($aDepartamentos as $Departamento){
                            $Consulta->bindParam(":CodDepartamento",$Departamento['CodDepartamento']);
                            $Consulta->bindParam(":DescDepartamento",$Departamento['DescDepartamento']);
                            $oFechaCreacion=new DateTime($Departamento['FechaCreacionDepartamento']);
                            $FechaCreacion=$oFechaCreacion->format('Y-m-d H:i:s');
                            $Consulta->bindParam(":FechaCreacionDepartamento",$FechaCreacion);
                            $Consulta->bindParam(":VolumenDeNegocio",$Departamento['VolumenDeNegocio']);
                            if($Departamento['FechaBajaDepartamento']){
                                $FechaBajaDepartamento=null;
                            }
                            else{
                                $oFechaBaja=new DateTime($Departamento['FechaBajaDepartamento']);
                                $FechaBajaDepartamento=$oFechaBaja->format('Y-m-d H:i:s');
                            }
                            $Consulta->bindParam(":FechaBajaDepartamento",$FechaBajaDepartamento);
                            $Consulta->execute();
                        }
                        $miDB->commit();
                        echo("<p class='verde'>Se añadieron los registros correctamente.</p>");
                        echo("<p class='verde'>Se va ha hacer un Commit.</p>");
                    }
                    catch(PDOException $miExceptionPDO){
                        //Instrucciones que se ejecutan si ocurre un error.
                        echo("<p class='rojo'>No se puede añadir registros porque hay algún código duplicado.</p>");
                        echo("<p class='rojo'>Se va ha hacer un RollBack.</p>");
                        $miDB->rollBack();
                        echo '<p class="rojo"><b>Error:</b>'.$miExceptionPDO->getMessage().'</p>';
                        echo '<p class="rojo"><b>Código de error:</b>'.$miExceptionPDO->getCode().'</p>';
                    }
                    finally{
                        unset($miDB);
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
                    <?php
                }
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 26-03-2026</p>
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