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
            <div id="titulo">22-Formulario cuestionario que muestra resultados en la misma página.</div>
            <?php
               /*
                * @author Óscar Pozuelo Villamandos
                * @version 1.0
                * @since 10-03-2026 
                * Ejercicio 22
                * Construir un formulario para recoger un cuestionario realizado a una 
                * persona y mostrar en la misma página las preguntas y las respuestas recogidas.
                */
                if(isset($_REQUEST['Enviar'])){
                    //Este código se ejucuta únicamente cuando se pulsa el botón enviar.
                    echo("<h3>Respuestas del formulario:</h3>");
                    echo("<p>Código:".$_REQUEST["codigo"]."</p>");
                    echo("<p>Descripción:".$_REQUEST["descripcion"]."</p>");
                }
                else{
                    //Este código se ejecuta antes de rellenar el formulario.
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <table class="formulario sinErrores">
                                <tr>
                                    <td>
                                        <label for="cod">Código:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="codigo" class="texto" id="cod">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="desc">Descripción:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="descripcion" class="texto" id="desc">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="Env">
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