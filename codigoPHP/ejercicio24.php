<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema 3 | Óscar Pozuelo Villamandos</title>
        <link rel="stylesheet" href="../webroot/css/fonts.css">
        <link rel="stylesheet" href="../webroot/css/all.min.css">
        <link rel="stylesheet" href="webroot/css/estilos.css"> 
        <link rel="stylesheet" href="webroot/css/estilosTabla.css"> 
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
                    Tema 3
                </div>
            </div>
        </header>
        <main id="contenedor">
            <div id="titulo">24-Formulario con validación y rellenado automático de campos correctos al haber error.</div>
            <?php
                /*
                 * @author: Óscar Pozuelo
                 * @since: 11/03/2026
                 * 24.Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la  misma página las preguntas
                 * y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje
                 * correspondiente, pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a
                 * teclearlas.
                 */
                // Importación de la librería de validación necesaria
                require_once "../core/080126libreriaValidacion.php";
                //Variable interruptor que nos indica que la entrada es correcta
                $entradaOK=true;
                //Array asociativo preparado para recoger los mensajes de error
                $aErrores=[
                    'CodDepartamento'          =>'', 
                    'DescDepartamento'         =>'',
                    'FechaCreacionDepartamento'=>'',
                    'VolumenDeNegocio'         =>'',
                    'FechaBajaDepartamento'    =>''
                ];
                //Array asociativo preparado para recoger las respuestas correctas (si $entradaOK)
                $aRespuestas=[ 
                    'CodDepartamento'          =>'', 
                    'DescDepartamento'         =>'',
                    'FechaCreacionDepartamento'=>'',
                    'VolumenDeNegocio'         =>'',
                    'FechaBajaDepartamento'    =>''
                ];
                //Para cada campo del formulario: Validar entrada de los datos
                if (isset($_REQUEST["Enviar"])){
                    //Código que se ejecuta cuando se envía el formulario
                    // Validamos los datos del formulario
                    $aErrores['CodDepartamento']=validacionFormularios::comprobarAlfabetico($_REQUEST['CodDepartamento'],3,1,1);
                    $aErrores['DescDepartamento']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'],1000,1,1);
                    $aErrores['FechaCreacionDepartamento']=validacionFormularios::validarFecha($_REQUEST['FechaCreacionDepartamento']);
                    $aErrores['VolumenDeNegocio']= validacionFormularios::comprobarFloatMonetarioES($_REQUEST['VolumenDeNegocio'],PHP_FLOAT_MAX,0,1);
                    $aErrores['FechaBajaDepartamento']=validacionFormularios::validarFecha($_REQUEST['FechaBajaDepartamento'],"31-12-9999",(new DateTime())->format("d-m-Y"),0);
                    foreach($aErrores as $campo => $valor){
                        if(!empty($valor)){
                            // Comprobar si el valor es válido
                            $entradaOK=false;
                        } 
                    }
                }
                else {
                    //Código que se ejecuta antes de rellenar el formulario
                    $entradaOK = false;
                }
                //Tratamiento del formulario
                if($entradaOK){
                    //Cargar la variable $aRespuestas y tratamiento de datos OK
                    // Recuperar los valores del formulario
                    date_default_timezone_set("Europe/Madrid");
                    setlocale(LC_TIME,'es_ES.UTF-8','es_ES','spanish');
                    $aRespuestas['CodDepartamento']=$_REQUEST['CodDepartamento'];
                    $aRespuestas['DescDepartamento']=$_REQUEST['DescDepartamento'];
                    $aRespuestas['FechaCreacionDepartamento']=(new DateTime($_REQUEST['FechaCreacionDepartamento']));
                    $aRespuestas['VolumenDeNegocio']=$_REQUEST['VolumenDeNegocio'].' €';
                    (empty($_REQUEST['FechaBajaDepartamento']))?$aRespuestas['FechaBajaDepartamento']='No tiene':$aRespuestas['FechaBajaDepartamento']=(new DateTime($_REQUEST['FechaBajaDepartamento']));
                    echo "<h3>Respuestas del formulario:</h3>";
                    foreach ($aRespuestas as $campo => $valor){
                        if($valor instanceof DateTime){
                            //echo "<p>".$campo."=".strftime("%d-%m-%Y",$valor->getTimestamp())."</p>";
                            echo "<p>".$campo."=".$valor->format("d-m-Y")."</p>";
                        }
                        else{
                            echo "<p>".$campo."=".$valor."</p>";
                        }
                    }
                }
                else {
                    //Mostrar el formulario hasta que lo rellenemos correctamente
                    //Mostrar los datos tecleados correctamente en intentos anteriores
                    //Mostrar mensajes de error (si los hay y el formulario no se muestra por primera vez)
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <table class="formulario conErrores">
                                <tr>
                                    <td>
                                        <label for="cod">Código:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="CodDepartamento" class="texto obligatorio" id="CodDepartamento" value="<?php echo(isset($_REQUEST["CodDepartamento"])&&empty($aErrores["CodDepartamento"]))?$_REQUEST["CodDepartamento"]:''?>">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['CodDepartamento']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="desc">Descripción:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="DescDepartamento" class="texto obligatorio" id="DescDepartamento" value="<?php echo(isset($_REQUEST["DescDepartamento"])&&empty($aErrores["DescDepartamento"]))?$_REQUEST["DescDepartamento"]:''?>">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['DescDepartamento']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="crea">Fecha de creación:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="FechaCreacionDepartamento" class="fecha bloqueado" id="FechaCreacionDepartamento" value="<?php echo(new DateTime())->format('d-m-Y');?>" readonly>
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['FechaCreacionDepartamento']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="Vol">Volumen de negocio:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="VolumenDeNegocio" class="texto obligatorio" id="VolumenDeNegocio" value="<?php echo(isset($_REQUEST["VolumenDeNegocio"])&&empty($aErrores["VolumenDeNegocio"]))?$_REQUEST["VolumenDeNegocio"]:''?>">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['VolumenDeNegocio']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="baja">Fecha de baja:</label>
                                    </td>
                                    <td>
                                        <input type="date" name="FechaBajaDepartamento" class="fecha" id="FechaBajaDepartamento" value="<?php echo(isset($_REQUEST["FechaBajaDepartamento"])&&empty($aErrores["FechaBajaDepartamento"]))?$_REQUEST["FechaBajaDepartamento"]:''?>">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['FechaBajaDepartamento']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" id="Env">
                                        <button type="submit" id="Enviar" name="Enviar">ENVIAR</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    <?php
                }
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 11-03-2026</p>
                </div>
                <div class="iconos-footer">
                    <a href="https://github.com/SrPozuelo/OPVDWESProyectoTema3" target="_blank" title="GitHub"><i class="fa-brands fa-github"></i></a>
                    <a href="../indexProyectoTema3.html" title="Inicio"><i class="fa-solid fa-house"></i></a>
                    <a href="../indexProyectoTema3.html" title="Volver a Tema3"><i class="fa-solid fa-arrow-turn-up"></i></a>
                </div>
            </div>
        </footer>
    </body>
</html>