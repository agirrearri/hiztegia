<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'Biblioteca.php';
        include_once 'Libro.php';
        include_once 'Biblioteca_vista.php';
        include_once 'Libro_vista.php';
        //inicializacion
        session_start();
        if (!isset($_SESSION['biblioteca'])) {
            //crear libros
            $lib1 = new libro("EL INVIERNO DEL MUNDO", "KEN FOLLET", 9788401353192, 523, "PLAZA & JANES EDITORES", "13/12/2012");
            $lib2 = new libro("LA HERMANDAD DE LOS LIBREROS MUERTOS", "MARIA BUNAR", 9788497787383, 245, "SGEL SOCIEDAD GENERAL ESPA&Ntilde;OLA DE LIBRERIA S.A.", "14/03/2012");
            $lib3 = new libro("IDAZTEN ARI DELA IDAZTEN DUEN IDAZLEA", "IBAN ZALDUA GONZALEZ", 9788490270318, 133, "ELKAR", "15/01/2012");
            //crear biblioteca y añadir libros
            $biblioteca = new Biblioteca();
            $biblioteca->addLibro($lib1);
            $biblioteca->addLibro($lib2);
            $biblioteca->addLibro($lib3);
            //guardar biblioteca en $_SESSION
            $_SESSION['biblioteca'] = $biblioteca;
        } else {
            $biblioteca = $_SESSION['biblioteca'];
        }
        //fin inicializacion
        //crea los objetos vista para utilizarlos para visualizaciones
        $biblioteca_vista = new Biblioteca_vista();
        $libro_vista = new Libro_vista();
        //funcionalidades y la lógica de la aplicación
        if (isset($_POST['libro']) != NULL) {//se ha seleccionado algun libro
            if (isset($_POST['mostrar'])) {
                //se ha pulsado boton Mostrar Informacion
                // con un libro seleccionado
                echo('<br>');
                $libro = $biblioteca->getLibro($_POST['libro']);
                $libro_vista->mostrarDisponivilidad($libro);
            } elseif (isset($_POST['comprar'])) {
                //se ha pulsado boton Añadir Ejemplar
                // con un libro seleccionado
                $libro_vista->formularioDeCompra($_POST['libro']);
            } elseif (isset($_POST['historial'])) {
                //se ha pulsado boton Historial del Libro
                // con un libro seleccionado
                $libro = $biblioteca->getLibro($_POST['libro']);
                $libro_vista->historialLibro($libro);
            }elseif(isset($_POST['compraEjem'])){
                /*en el formulario donde se indica 
                 * cuantas unidades de libro comprar
                 *  se ha pulsado el boton de Confirmar Compra*/
                $libro = $biblioteca->getLibro($_POST['libro']);
                $libro->addNuevosEjemplares($_POST['cantidad']);
            }
        }else{
            /*no se ha seleccionado ningun libro y 
            se ha pulsado el boton de Mostrar Listado Completo*/
            if(isset($_POST['listado'])) {
                $biblioteca_vista->mostrarListado($biblioteca);
            }
        }
        $biblioteca_vista->mostrar_biblioteca($biblioteca);
        ?>
    </body>
</html>