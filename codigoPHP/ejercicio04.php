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
            <div id="titulo">4-Mostrar fecha y hora actual en Oporto formateada en portugués.</div>
            <?php
                date_default_timezone_set('Europe/Lisbon');
                $oFecha=new DateTime();
                setlocale(LC_TIME,'pt_PT.utf8');
                echo("<h3>Fecha y hora actual en portugés con format():</h3>");
                echo("<p>".$oFecha->format("I,d F Y H:i:s")."</p>");
                echo("<h3>Fecha y hora actual en portugés con strftime():</h3>");
                echo("<p>".strftime("%A %d de %B del %Y %H:%M:%S")."</p>");
                $oFormateador= new IntlDateFormatter(
                    'pt_PT',
                    IntlDateFormatter::FULL,
                    IntlDateFormatter::NONE,
                    'Europe/Lisbon',
                    IntlDateFormatter::GREGORIAN
                );
                echo "<h3>Fecha y hora actual en portugués con la clase IntlDateFormatter:</h3><br>";
                echo "<p>A data de hoje é: <span>".$oFormateador->format($oFecha)."</span></p>";
                echo "<p>E a hora atual é: ".$oFecha->format("H:i:s")."</p>";
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 23-02-2026</p>
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