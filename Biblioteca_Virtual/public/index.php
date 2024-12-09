<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mineducyt\Biblioteca_Virtual\Biblioteca;
use Mineducyt\Biblioteca_Virtual\Libro;
use Mineducyt\Biblioteca_Virtual\Usuario;

$biblioteca = new Biblioteca();

// Crear libros
$libro1 = new Libro(1, "El Quijote", "Miguel de Cervantes", "Novela");
$libro2 = new Libro(2, "1984", "George Orwell", "Ficción");
$libro3 = new Libro(3, "Cien años de soledad", "Gabriel García Márquez", "Realismo Mágico");

// Agregar libros a la biblioteca
$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);
$biblioteca->agregarLibro($libro3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Biblioteca Virtual</h1>

        <h2>Libros disponibles:</h2>
        <ul class="book-list">
            <?php $biblioteca->mostrarLibros(); ?>
        </ul>

        <h2>Buscar libros por autor: "Cervantes"</h2>
        <ul class="result-list">
            <?php
            $resultados = $biblioteca->buscarLibro('getAutor', 'Cervantes');
            foreach ($resultados as $libro) {
                echo "<li>" . $libro->getTitulo() . " de " . $libro->getAutor() . "</li>";
            }
            ?>
        </ul>

        <h2>Préstamo de libro:</h2>
        <p class="success">
            <?php
            $usuario = new Usuario("Juan");
            echo $usuario->prestarLibro($libro1);
            ?>
        </p>

        <h2>Estado de los libros:</h2>
        <ul class="book-list">
            <?php $biblioteca->mostrarLibros(); ?>
        </ul>
    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> Biblioteca Virtual. Todos los derechos reservados.
    </footer>
</body>
</html>

