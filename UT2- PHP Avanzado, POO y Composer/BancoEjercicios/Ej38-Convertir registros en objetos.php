<?php
require_once __DIR__ . '/Ej38-42-Datos.php';

$objetosLibro = array_map(
    fn (array $a) =>
    new Libro(
        paginas: $a['paginas'],
        id: $a['id'],
        disponible: $a['disponible'],
        titulo: $a['titulo']
    ),
    $datos
);
foreach($objetosLibro as $libro) {
    echo ' id: ' . $libro->id
    . ' título: ' . $libro->titulo
    . ' páginas: ' . $libro->paginas
    . ' disponible: ' . ($libro->disponible? 'Disponible' : 'No disponible') . PHP_EOL;
}       