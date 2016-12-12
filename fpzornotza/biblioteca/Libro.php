<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of libro
 *

 */
class Libro {

    private $titulo;
    private $autor;
    private $ISBN;
    private $paginas;
    private $editorial;
    private $fechaEdicion;
    private $ejemplares = array();
    private $historial = 0;

    function __construct($titulo, $autor, $ISBN, $paginas, $editorial, $fechaEdicion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ISBN = $ISBN;
        $this->paginas = $paginas;
        $this->editorial = $editorial;
        $this->fechaEdicion = $fechaEdicion;
        $this->ejemplares[] = TRUE;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function getPaginas() {
        return $this->paginas;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function getFechaEdicion() {
        return $this->fechaEdicion;
    }

    public function getEjemplares() {
        return $this->ejemplares;
    }

    public function getHistorial() {
        return $this->historial;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function setPaginas($paginas) {
        $this->paginas = $paginas;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function setFechaEdicion($fechaEdicion) {
        $this->fechaEdicion = $fechaEdicion;
    }

    public function setEjemplares($ejemplares) {
        $this->ejemplares = $ejemplares;
    }

    public function setHistorial($historial) {
        $this->historial = $historial;
    }

    public function nuevoEjemplar() {
        $this->ejemplares[] = TRUE;
    }
    
    public function addNuevosEjemplares($cantidad) {
        for($i=0; $i<$cantidad; $i++){
            $this->ejemplares[] = TRUE;
        }
    }

    public function alquilarEjemplar() {
        $i = 0;
        while ($this->ejemplares[$i] == FALSE) {
            $i++;
        }
        $this->ejemplares[$i] = FALSE;
        $this->historial++;
    }

    public function devolverEjemplar() {
        $i = count($this->ejemplares) - 1;
        if (in_array(FALSE, $this->ejemplares)) {
            while ($this->ejemplares[$i] == TRUE) {
                $i--;
            }
            $this->ejemplares[$i] = TRUE;
        }
    }

    public function mostrarLibro() {
        echo "Titulo: " . $this->titulo . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "ISBN: " . $this->ISBN . "<br>";
        echo $this->editorial . " " . $this->fechaEdicion . "<br>";
        echo $this->paginas . " p&aacute;ginas<br>";
    }

}
