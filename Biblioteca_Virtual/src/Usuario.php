<?php

namespace Mineducyt\Biblioteca_Virtual;

class Usuario {
    private $nombre;
    private $librosPrestados = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function prestarLibro($libro) {
        if ($libro->estaDisponible()) {
            $libro->prestar();
            $this->librosPrestados[] = $libro;
            return "Libro prestado con éxito.";
        }
        return "El libro no está disponible.";
    }

    public function devolverLibro($libro) {
        $libro->devolver();
        $key = array_search($libro, $this->librosPrestados);
        if ($key !== false) {
            unset($this->librosPrestados[$key]);
        }
        return "Libro devuelto con éxito.";
    }
}
