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
            <div id="titulo">1-Inicializar variables de distintos tipos de datos básicos (string, int, float, bool) y mostrarlos (echo, print, printf, print_r, var_dump).</div>
            <?php
                /**
                * @author: Óscar Pozuelo Villamandos
                * @since: 03/03/2026
                * 1-Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump).
                */
                $sCadena="¡Hola mundo!";
                $iEntero=1425;
                $fDecimal=98.15;
                $bBooleano=false;
                $aDatos=[$sCadena,$iEntero,$fDecimal,$bBooleano];
                echo("<h3>Usando echo:</h3>");
                echo('<p>La variable <span class="variable">$sCadena</span> es de tipo <span class="tipo">"'.gettype($sCadena).'"</span> y contiene el valor <span class="valor">'.$sCadena.'</span></p>');
                echo('<p>La variable <span class="variable">$iEntero</span> es de tipo <span class="tipo">"'.gettype($iEntero).'"</span> y contiene el valor <span class="valor">'.$iEntero.'</span></p>');
                echo('<p>La variable <span class="variable">$fDecimal</span> es de tipo <span class="tipo">"'.gettype($fDecimal).'"</span> y contiene el valor <span class="valor">'.$fDecimal.'</span></p>');
                echo('<p>La variable <span class="variable">$bBooleano</span> es de tipo <span class="tipo">"'.gettype($bBooleano).'"</span> y contiene el valor <span class="valor">'.($bBooleano?"true":"false").'</span></p>');

                print("<h3>Usando print:</h3>");
                print('<p>La variable <span class="variable">$sCadena</span> es de tipo <span class="tipo">"'.gettype($sCadena).'"</span> y contiene el valor <span class="valor">'.$sCadena.'</span></p>');
                print('<p>La variable <span class="variable">$iEntero</span> es de tipo <span class="tipo">"'.gettype($iEntero).'"</span> y contiene el valor <span class="valor">'.$iEntero.'</span></p>');
                print('<p>La variable <span class="variable">$fDecimal</span> es de tipo <span class="tipo">"'.gettype($fDecimal).'"</span> y contiene el valor <span class="valor">'.$fDecimal.'</span></p>');
                print('<p>La variable <span class="variable">$bBooleano</span> es de tipo <span class="tipo">"'.gettype($bBooleano).'"</span> y contiene el valor <span class="valor">'.($bBooleano?"true":"false").'</p></span>');

                printf("<h3>Usando printf:</h3>");
                printf("<p>La variable <span class='variable'>%s</span> es de tipo <span class='tipo'>%s</span> y tiene el valor <span class='valor'>%s</span></p>", '$sCadena', gettype($sCadena), $sCadena);
                printf("<p>La variable <span class='variable'>%s</span> es de tipo <span class='tipo'>%s</span> y tiene el valor <span class='valor'>%d</span></p>", '$iEntero', gettype($iEntero), $iEntero);
                printf("<p>La variable <span class='variable'>%s</span> es de tipo <span class='tipo'>%s</span> y tiene el valor <span class='valor'>%.2f</span></p>", '$fDecimal', gettype($fDecimal), $fDecimal);
                printf("<p>La variable <span class='variable'>%s</span> es de tipo <span class='tipo'>%s</span> y tiene el valor <span class='valor'>%s</span></p>", '$bBooleano', gettype($bBooleano), ($bBooleano?"true":"false"));

                print_r("<h3>Usando print_r:</h3>");
                echo("<p>");
                print_r($aDatos,false);
                echo("</p>");
                echo("<br>");
                echo("<p>");
                print_r($aDatos,true);
                echo("</p>");
                echo("<br>");
                print_r('<p>La variable <span class="variable">$sCadena</span> es de tipo <span class="tipo">'.gettype($sCadena).'</span> y tiene el valor <span class="valor">'.$sCadena.'</span></p>');
                print_r('<p>La variable <span class="variable">$iEntero</span> es de tipo <span class="tipo">'.gettype($iEntero).'</span> y tiene el valor <span class="valor">'.$iEntero.'</span></p>');
                print_r('<p>La variable <span class="variable">$fDecimal</span> es de tipo <span class="tipo">'.gettype($fDecimal).'</span> y tiene el valor <span class="valor">'.$fDecimal.'</span></p>');
                print_r('<p>La variable <span class="variable">$bBooleano</span> es de tipo <span class="tipo">'.gettype($bBooleano).'</span> y tiene el valor <span class="valor">'.($bBooleano?"true":"false").'</span></p>');

                echo("<h3>Usando var_dump:</h3>");
                var_dump($sCadena);echo("<br>");
                var_dump($iEntero);echo("<br>");
                var_dump($fDecimal);echo("<br>");
                var_dump($bBooleano);echo("<br>");
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