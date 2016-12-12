<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Biblioteca_vista
 *
 * @author irakaslea
 */
class Biblioteca_vista {
    
        public function mostrar_biblioteca($biblioteca) {
        ?> 
        <form method="post">
            <table border>
                <th>Titulo</th><th>Autor</th><th>ISBN</th><th>Paginas</th><th>Editorial</th><th>Fecha de Edicion</th><th>Ejemplares</th>
                <?php
                foreach ($biblioteca->getLibros() as $key=>$libro) {
                    echo "<tr>";
                    echo "<td>" . $libro->getTitulo() . "</td>";
                    echo "<td>" . $libro->getAutor() . "</td>";
                    echo "<td>" . $libro->getISBN() . "</td>";
                    echo "<td>" . $libro->getPaginas() . "</td>";
                    echo "<td>" . $libro->getEditorial() . "</td>";
                    echo "<td>" . $libro->getFechaEdicion() . "</td>";
                    echo "<td>" . count($libro->getEjemplares()) . "</td>";
                    ?> <td> <input type="radio" name="libro" value="<?php echo $key; ?>"></td></tr> 
                                            <?php } ?>
            </table>
            <input type="submit" name="mostrar" value="Mostrar Informacion">
            <input type="submit" name="comprar" value="Añadir Ejemplar">
            <input type="submit" name="listado" value="Mostrar Listado Completo">
            <input type="submit" name="historial" value="Historial del libro">
        </form>
        <?php
    }
    
    public function mostrarListado($biblioteca) {
        $prestados = 0;
        $disponibles = 0;

        $libros = $biblioteca->getLibros();
        foreach ($libros as $lib) {
            echo "<p>" . $lib->getTitulo();
            echo "<ul>";
            foreach ($lib->getEjemplares() as $ejemplar) {

                if ($ejemplar == TRUE) {
                    $disponibles++;
                    echo "<li>Disponible</li>";
                } else {
                    $prestados++;
                    echo "<li>Prestado</li>";
                }
            }
            echo "</ul>";
        }
        $cantLibros = $disponibles + $prestados;
        echo "<p>De los " . $cantLibros . " libros de la biblioteca, "
        . $prestados . " estan prestados y " . $disponibles . " libres.";
    }
    
}
