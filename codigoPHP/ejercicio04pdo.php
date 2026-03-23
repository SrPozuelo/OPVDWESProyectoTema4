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
            <div id="titulo">4-Mantenimiento de departamentos.</div>
            <?php
                require_once "../core/libreriaValidacion.php";
                require_once "../conf/ConfDBPDO.php";
                //Variable interruptor que nos indica que la entrada es correcta
                $entradaOK=true;
                $sTerminoDeBusqueda='%%';
                //Array asociativo preparado para recoger los mensajes de error
                $aErrores=[
                    'DescDepartamento'=>''
                ];
                //Array asociativo preparado para recoger las respuestas correctas (si $entradaOK)
                $aRespuestas=[
                    'DescDepartamento'=>''
                ];
                //Para cada campo del formulario: Validar entrada de los datos
                if (isset($_REQUEST["Enviar"])){
                    //Código que se ejecuta cuando se envía el formulario
                    // Validamos los datos del formulario
                    $aErrores['DescDepartamento']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'],1000,1,1);
                    foreach($aErrores as $campo => $valor){
                        if(!empty($valor)){
                            //Comprobar si el valor es válido
                            $entradaOK=false;
                        } 
                    }
                }
                else{
                    //Código que se ejecuta antes de rellenar el formulario
                    $entradaOK = false;
                }
                //Tratamiento del formulario
                if($entradaOK){
                    //Cargar la variable $aRespuestas y tratamiento de datos OK
                    // Recuperar los valores del formulario
                    $aRespuestas['DescDepartamento']=$_REQUEST['DescDepartamento'];
                    $sTerminoDeBusqueda='%'.strtolower($aRespuestas['DescDepartamento']).'%';
                }
                /*
                 * Se muestra el formulario.
                 */
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <table class="formulario conErrores">
                    <tr>
                        <td>
                            <label for="desc">Descripción:</label>
                        </td>
                        <td>
                            <input type="text" name="DescDepartamento" class="texto obligatorio" id="DescDepartamento" value="<?php echo(isset($_REQUEST["DescDepartamento"])&&empty($aErrores["DescDepartamento"]))?$_REQUEST["DescDepartamento"]:''?>">
                        </td>
                        <td id="Env">
                            <button type="submit" id="Enviar" name="Enviar">BUSCAR</button>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                /*
                 * Se muestra el listado de departamentos.
                 */
            ?>
            <h3>Resultado de la busqueda:</h3>
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
                            if(empty($aRespuestas['DescDpto'])){
                                $resultadoConsulta=$miDB->prepare("SELECT * FROM T02_Departamento WHERE LOWER(T02_DescDepartamento) LIKE '$sTerminoDeBusqueda';");
                            }
                            else{
                                $resultadoConsulta=$miDB->prepare('SELECT * FROM T02_Departamento');
                            }
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
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 19-03-2026</p>
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