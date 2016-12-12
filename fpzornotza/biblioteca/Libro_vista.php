<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Libro_vista
 *
 * @author irakaslea
 */
class Libro_vista {

    //put your code here
    public function mostrarLibro() {
        echo "Titulo: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "ISBN: " . $this->ISBN . "<br>";
        echo $this->editorial . " " . $this->fechaEdicion . "<br>";
        echo $this->paginas . " p&aacute;ginas<br>";
    }

    public function mostrarDisponivilidad($libro) {
//        $libro = $_SESSION['biblio']->getLibros()[$key];
        $libro->mostrarLibro();
//        echo "Numero de ejemplares: " . count($libro->getEjemplares()) . "<br>";
        if (in_array(TRUE, $libro->getEjemplares())) {
            ?><table border><?php
                foreach ($libro->getEjemplares() as $ejemplar) {
                    echo "<td style='width: 20px; height: 20px; ";
                    if (!$ejemplar) {
                        echo "background-color: red;'";
                    } else {
                        echo "background-color: green;'";
                    }
                    echo "></td>";
                }
                ?></table>
            <?php
            $this->mostrarFuncionesLibro();
        } else {
            echo "Ningun ejemplar disponible";
            ?>
            <form method="post">
                <input type="submit" name="devolver" value="Devolver">
            </form>
            <?php
        }
    }

    private function mostrarFuncionesLibro() {
        ?>
        <form method="post">
            <input type="submit" name="alquilar" value="Alquilar">
            <input type="submit" name="devolver" value="Devolver">
        </form>
        <?php
    }

    public function formularioDeCompra($key) {
        ?><form method="post">
            <input type="hidden" name="libro" value="<?= $key?>"/>
            <label for="cant">Cantidad de ejemplares:</label>
            <input type="number" id="cant" name="cantidad"/>
            <input type="submit" name="compraEjem" value="Confirmar Compra"/>
        </form><?php
    }
    
    public function historialLibro($libro) {
        echo "<p>Titulo: " . $libro->getTitulo();
        echo "<p>Autor: " . $libro->getAutor();
        echo "<p>Este libro ha sido prestado " . $libro->getHistorial() . " veces";
    }

}
