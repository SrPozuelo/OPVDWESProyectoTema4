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
            <div id="titulo">17-Array bidimensional (Teatro 20x15). Inicializar 5 asientos y recorrer para mostrar ocupación.</div>
            <?php
                define("FILAS",20);
                define("ASIENTOS",15);
                for($iFila=1;$iFila<=FILAS;$iFila++){
                    for($iColumna=1;$iColumna<=ASIENTOS;$iColumna++){
                        $aTeatro[$iFila][$iColumna]=null;
                    }
                }
                $aTeatro[1][1]="Jose";
                $aTeatro[2][2]="Carlos";
                $aTeatro[3][8]="Marcelo";
                $aTeatro[7][11]="Miguel";
                $aTeatro[8][13]="Pepe";
            ?>
            <table class="teatro">
                <?php
                    echo("<tr>");
                        echo("<td class='nada'></td>");
                        for($iColumna=1;$iColumna<=ASIENTOS;$iColumna++){
                            echo("<td class='borde'>A ".$iColumna."</td>");
                        }
                        echo("<td class='nada'></td>");
                    echo("</tr>");
                    for($iFila=1;$iFila<=FILAS;$iFila++){
                        echo("<tr>");
                            echo("<td class='borde'>F ".$iFila."</td>");
                            for($iColumna=1;$iColumna<=ASIENTOS;$iColumna++){
                                if(is_null($aTeatro[$iFila][$iColumna])){
                                    echo("<td style='background-color:rgb(255,30,30)'>F ".$iFila."  A ".$iColumna."</td>");
                                }
                                else{
                                    echo("<td style='background-color:lime'>".$aTeatro[$iFila][$iColumna]."</td>");
                                }
                            }
                            echo("<td class='borde'>F ".$iFila."</td>");
                        echo("</tr>");
                    }
                    echo("<tr>");
                        echo("<td class='nada'></td>");
                        for($iColumna=1;$iColumna<=ASIENTOS;$iColumna++){
                            echo("<td class='borde'>A ".$iColumna."</td>");
                        }
                        echo("<td class='nada'></td>");
                    echo("</tr>");
                ?>
            </table>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 06-03-2026</p>
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