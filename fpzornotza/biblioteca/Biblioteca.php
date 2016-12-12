<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of biblioteca
 *

 */
class Biblioteca {

    private $libros = array();

    public function getLibros() {
        return $this->libros;
    }
    
    public function getLibro($key){
        return $this->libros[$key];
    }

    public function setLibros($libros) {
        $this->libros = $libros;
    }

    public function addLibro($libro) {
        $this->libros[] = $libro;
    }

}
