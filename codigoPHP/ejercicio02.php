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
            <div id="titulo">2-Inicializar y mostrar una variable heredoc.</div>
            <?php
                /*
                 * @author: Óscar Pozuelo Villamandos
                 * @since: 03/03/2026
                 * 2.Inicializar y mostrar una variable heredoc.
                 */
                $heredoc=<<<cadena
                    Esto es
                    es una cadena
                    de texto en
                    varias líneas.
                cadena;
                echo "<h3>Uso de variable heredoc:</h3>";
                echo "<h4>    Con la etiqueta pre:</h4>";
                echo "<pre>".$heredoc."</pre>";
                echo "<h4>    Con la etiqueta p:</h4>";
                echo "<p>".$heredoc."</p>"
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 03-03-2026</p>
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