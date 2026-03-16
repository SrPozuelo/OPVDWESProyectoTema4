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
            <div id="titulo">23-Formulario con validación: si hay error vuelve a salir el formulario con mensaje.</div>
            <?php
                /*
                 * @author: Óscar Pozuelo
                 * @since: 10/03/2026
                 * 23.Construir un formulario para recoger un cuestionario realizado a una persona y mostrar
                 * en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna
                 * respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente.
                 */
                // Importación de la librería de validación necesaria
                require_once "../core/231018libreriaValidacion.php";
                //Variable interruptor que nos indica que la entrada es correcta
                $entradaOK = true;
                //Array asociativo preparado para recoger los mensajes de error
                $aErrores = [
                    'codigo' => '', 
                    'descripcion' => ''
                ];
                //Array asociativo preparado para recoger las respuestas correctas (si $entradaOK)
                $aRespuestas=[ 
                    'codigo' => '', 
                    'descripcion' => ''
                ]; 
                //Para cada campo del formulario: Validar entrada de los datos
                if (isset($_REQUEST["Enviar"])){
                    //Código que se ejecuta cuando se envía el formulario
                    // Validamos los datos del formulario
                    $aErrores['codigo']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'],3,1,1);
                    $aErrores['descripcion']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'],1000,1,1);
                    foreach($aErrores as $campo => $valor){
                        if(!empty($valor)){
                            // Comprobar si el valor es válido
                            $entradaOK = false;
                        } 
                    }
                }
                else {
                    //Código que se ejecuta antes de rellenar el formulario
                    $entradaOK = false;
                }
                //Tratamiento del formulario
                if($entradaOK){ //Cargar la variable $aRespuestas y tratamiento de datos OK
                    // Recuperar los valores del formulario
                    $aRespuestas['codigo']=$_REQUEST['codigo'];
                    $aRespuestas['descripcion']=$_REQUEST['descripcion'];
                    echo "<h3>Respuestas del formulario:</h3>";
                    foreach ($aRespuestas as $campo => $valor) {
                        echo "<p>".$campo."=".$valor."</p>";
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
                                        <input type="text" name="codigo" class="texto obligatorio" id="cod">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['codigo']?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="desc">Descripción:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="descripcion" class="texto obligatorio" id="desc">
                                    </td>
                                    <td class="span">
                                        <span><?php echo $aErrores['descripcion']?></span>
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
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 10-03-2026</p>
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