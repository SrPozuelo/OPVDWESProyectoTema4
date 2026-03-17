<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tema 3 | Óscar Pozuelo Villamandos</title>
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
                    Tema 3
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

        // Atributos de la conexión para usar después al mostrar
        $aAtributos = array(
            "AUTOCOMMIT",
            "ERRMODE",
            "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
            "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
            "TIMEOUT"
        );

        // Establecimiento de conexión con valores correctos
        echo '<h3>Conexión a DBGJLDWESProyectoTema4 correctamente: </h3>';
        try {
            $miDB = new PDO(DSN,USERNAME,PASSWORD);
            echo 'Conectado a la BBDD con éxito';
            echo '<br><br>';

            echo '<p><b>Atributos de la conexión: </b></p>';
            foreach ( $aAtributos as $atributo ) {
                echo "PDO::ATTR_$atributo: ";
                try {
                    echo '<span class="azul">'.$miDB->getAttribute( constant( "PDO::ATTR_$atributo" ) ) . "</span><br>";
                } catch ( PDOException $miExceptionPDO ) {
                    echo '<span class="rojo"> <b>Error: </b>'.$miExceptionPDO->getMessage().' <b>con código de error:</b> '.$miExceptionPDO->getCode()."</span><br>";
                }
            }

        } catch (PDOException $miExceptionPDO) {
            echo 'Error: '.$miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: '.$miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }

        // Establecimiento de conexión con valores incorrectos
        echo '<h3>Conexión a DBGJLDWESProyectoTema4 incorrectamente: </h3>';
        try {
            $miDB = new PDO(DSN,USERNAME,'error');
            echo 'Conectado a la BBDD con éxito';
            echo '<br><br>';

            echo '<p><b>Atributos de la conexión: </b></p>';
            foreach ( $aAtributos as $atributo ) {
                echo "PDO::ATTR_$atributo: ";
                try {
                    echo '<span class="azul">'.$miDB->getAttribute( constant( "PDO::ATTR_$atributo" ) ) . "</span><br>";
                } catch ( PDOException $miExceptionPDO ) {
                    echo '<span class="rojo"> <b>Error: </b>'.$miExceptionPDO->getMessage().' <b>con código de error:</b> '.$miExceptionPDO->getCode()."</span><br>";
                }
            }

        } catch (PDOException $miExceptionPDO) {
            echo 'Error: '.$miExceptionPDO->getMessage();
            echo '<br>';
            echo 'Código de error: '.$miExceptionPDO->getCode();
        } finally {
            unset($miDB);
        }
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