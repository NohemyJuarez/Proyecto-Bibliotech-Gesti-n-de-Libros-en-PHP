<?php

namespace Mineducyt\Biblioteca_Virtual;

class Biblioteca {
    private $libros = [];

    public function agregarLibro($libro) {
        $this->libros[] = $libro;
    }

    public function mostrarLibros() {
        foreach ($this->libros as $libro) {
            echo "<div class='libro'>";
            echo "<p><strong>Título:</strong> " . $libro->getTitulo() . "</p>";
            echo "<p><strong>Autor:</strong> " . $libro->getAutor() . "</p>";
            echo "<p><strong>Categoría:</strong> " . $libro->getCategoria() . "</p>";
            echo "<p class='" . ($libro->estaDisponible() ? "disponibilidad" : "no-disponible") . "'>";
            echo $libro->estaDisponible() ? "Disponible" : "No disponible";
            echo "</p>";
            echo "</div>";
        }
    }

    public function buscarLibro($criterio, $valor) {
        $resultados = [];
        foreach ($this->libros as $libro) {
            if ($libro->$criterio() == $valor) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }
}
