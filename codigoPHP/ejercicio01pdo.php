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
            <div id="titulo">1-Conexión a la base de datos con la cuenta usuario y tratamiento de errores..</div>
            <?php
                /**
                 * @author: Óscar Pozuelo
                 * @since: 17/03/2026
                 * 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores. Utilizar excepciones automáticas siempre que sea posible en todos los ejercicios.
                 */
                // importamos el archivo con los datos de conexión
                require_once '../conf/ConfDBPDO.php';
                //Atributos de la conexión para usar después al mostrar
                $aAtributos = array(
                    "AUTOCOMMIT",
                    "ERRMODE",
                    "CASE",
                    "CLIENT_VERSION",
                    "CONNECTION_STATUS",
                    "ORACLE_NULLS",
                    "PERSISTENT",
                    "PREFETCH",
                    "SERVER_INFO",
                    "SERVER_VERSION",
                    "TIMEOUT"
                );
                // Establecimiento de conexión con valores correctos
                echo '<h3>Conexión a DBOPVDWESProyectoTema4 correctamente: </h3>';
                try{
                    $miDB = new PDO(DSN,USERNAME,PASSWORD);
                    echo '<p>Conectado a la BBDD con éxito</p>';
                    echo '<h4>Atributos de la conexión:</h4>';
                    foreach( $aAtributos as $atributo ){
                        echo "<p><span class='variable'>PDO::ATTR_$atributo:</span>";
                        try{
                            echo '<span class="azul">'.$miDB->getAttribute(constant("PDO::ATTR_$atributo" ))."</span></p>";
                        }
                        catch ( PDOException $miExceptionPDO ) {
                            echo '<span class="rojo"> <b>Error: </b>'.$miExceptionPDO->getMessage().'<b>con código de error:</b>'.$miExceptionPDO->getCode()."</span></p>";
                        }
                    }
                }
                catch (PDOException $miExceptionPDO){
                    echo '<p>Error: '.$miExceptionPDO->getMessage().'</p>';
                    echo '<p>Código de error: '.$miExceptionPDO->getCode().'</p>';
                }
                finally{
                    unset($miDB);
                }
                // Establecimiento de conexión con valores incorrectos
                echo '<h3>Conexión a DBOPVDWESProyectoTema4 incorrectamente: </h3>';
                try{
                    $miDB = new PDO(DSN,USERNAME,'error');
                    echo '<p>Conectado a la BBDD con éxito</p>';
                    echo '<p>Atributos de la conexión:</p>';
                    foreach ( $aAtributos as $atributo ) {
                        echo "<p><span class='variable' PDO::ATTR_$atributo:</span>";
                        try {
                            echo '<p><span class="azul">'.$miDB->getAttribute( constant( "PDO::ATTR_$atributo" ) ) . "</span></p>";
                        }
                        catch(PDOException $miExceptionPDO){
                            echo '<p><span class="rojo"><b>Error:</b>'.$miExceptionPDO->getMessage().'<b>con código de error:</b>'.$miExceptionPDO->getCode()."</span></p>";
                        }
                    }
                }
                catch (PDOException $miExceptionPDO){
                    echo '<p><span class="rojo">Error: '.$miExceptionPDO->getMessage().'</span></p>';
                    echo '<p><span class="rojo">Código de error: '.$miExceptionPDO->getCode().'</span></p>';
                }
                finally{
                    unset($miDB);
                }
            ?>
        </main>
        <footer class="pie-pagina">
            <div class="contenido-footer">
                <div class="texto-legal">
                    <p>2025-26 IES LOS SAUCES. ©Todos los derechos reservados.</p>
                    <p class="autor"><a href="https://oscarpozvil.ieslossauces.es" target="_blank">Óscar Pozuelo Villamandos.</a> Fecha de Actualización: 18-03-2026</p>
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