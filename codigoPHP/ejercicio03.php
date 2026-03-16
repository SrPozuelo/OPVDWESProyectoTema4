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
            <div id="titulo">3-Mostrar fecha y hora actual formateada en castellano (clase DateTime).</div>
            <?php
                /*
                 * @author Óscar Pozuelo Villamandos
                 * @since 04/03/2026
                 * 3-Mostrar fecha y hora actual formateada en castellano (clase DateTime).
                 * 
                 */
                $oFecha;
                date_default_timezone_set('Europe/Madrid');  
                setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                $oFecha=new DateTime();
                echo("<h3>Fecha y hora actual:</h3>");
                echo'<p>Si se utiliza solo format() de DateTime los dias de la semana y los meses están inglés:</p>';
                echo("<p>La fecha de hoy es :<span> " . $oFecha->format("l") . " " . $oFecha->format("d") . " de " . $oFecha->format("F") . " del " . $oFecha->format("o") . " y la hora es: " . $oFecha->format("H:i:s") . '</span></p>');
                //info para el parametro format : https://www.php.net/manual/es/datetime.format.php
                echo('<h3>Usando el timestamp de DateTime y strftime, los dias y los meses están en español:</h3> ');
                echo "<p>La fecha de hoy es: <span>" . strftime("%A %d de %B del %Y", $oFecha->getTimestamp())." y la hora es: " . $oFecha->format("H:i:s") . '</span></p>';
                echo("<h3>La fecha de hoy usando la clase IntlDateFormatter:</h3>");
                $oFormateador= new IntlDateFormatter(
                    'es_ES',
                    IntlDateFormatter::FULL,
                    IntlDateFormatter::NONE,
                    'Europe/Madrid',
                    IntlDateFormatter::GREGORIAN
                );
                echo ("<p>La fecha actual:".$oFormateador->format($oFecha)."</p>");
                //Fecha dentro de 60 dias
                echo("<h3>La fecha dentro de 60 dias: </h3>");
                $oFechaMas60Dias=$oFecha->modify("+ 60 days");
                echo("<p>".strftime("%A %d de %B del %Y", $oFechaMas60Dias->getTimestamp())."</p>");
                //Utilizando la fecha actual
                echo ("<h3>Distintos formas de mostrar la fecha y la hora:</h3>");
                echo ("<p>".($oFecha->format("Y-m-d H:i:s"))."</p>");
                echo ("<p>".$oFecha->format("l, d F Y")."</p>");
                echo ("<p>".$oFecha->format("D, d M Y")."</p>");
                echo ("<p>¿Es año bisiesto? (1=Si, 0=No): ".($oFecha->format("L"))."</p>");
                echo ("<p>".$oFecha->format("H:i:s")."</p>");
                echo ("<p>".$oFecha->format("h:i A")."</p>");
                echo ("<p>Zona horaria: ".$oFecha->format("e")."</p>");
                echo ("<p>Año: ".($oFecha->format("Y"))."</p>");
                echo ("<p>Día de la semana en español: ".(strftime("%A",$oFecha->getTimestamp()))."</p>");
                echo ("<p>Día de la semana en inglés: ".($oFecha->format("l"))."</p>");
                echo ("<p>Timestamp de ahora:".$oFecha->getTimestamp()."</p>");
                //Utilizando la fecha del descubrimiento de América.
                $oDescubrimientoDeAmerica=new DateTime("12-10-1492 02:00:00");
                echo ("<h3>Distintos formas de mostrar la fecha y la hora del descubrimiento de América:</h3>");
                echo ("<p>".($oDescubrimientoDeAmerica->format("Y-m-d H:i:s"))."</p>");
                echo ("<p>".$oDescubrimientoDeAmerica->format("l, d F Y")."</p>");
                echo ("<p>".$oDescubrimientoDeAmerica->format("D, d M Y")."</p>");
                echo ("<p>¿Es año bisiesto? (1=Si, 0=No): ".($oDescubrimientoDeAmerica->format("L"))."</p>");
                echo ("<p>".$oDescubrimientoDeAmerica->format("H:i:s")."</p>");
                echo ("<p>".$oDescubrimientoDeAmerica->format("h:i A")."</p>");
                echo ("<p>Zona horaria: ".$oDescubrimientoDeAmerica->format("e")."</p>");
                echo ("<p>Año: ".($oDescubrimientoDeAmerica->format("Y"))."</p>");
                echo ("<p>Día de la semana en español: ".strftime("%A",$oDescubrimientoDeAmerica->getTimestamp())."</p>");
                echo ("<p>Día de la semana en inglés: ".($oDescubrimientoDeAmerica->format("l"))."</p>");
                echo ("<p>Timestamp del descubrimento de America:".$oDescubrimientoDeAmerica->getTimestamp()."</p>");
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