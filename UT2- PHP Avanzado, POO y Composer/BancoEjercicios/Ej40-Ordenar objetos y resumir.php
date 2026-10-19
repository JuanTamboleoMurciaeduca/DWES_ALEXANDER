<?php
require_once __DIR__ . '/Ej38-Convertir registros en objetos.php';

usort($objetosLibro,
    fn (Libro $a, Libro $b): int =>
    $a->paginas <=> $b->paginas
);//Sentido ascendente
print_r ($objetosLibro);
usort($objetosLibro,
    fn (Libro $a, Libro $b): int =>
    $b->paginas <=> $a->paginas
);//Sentido descendente
print_r ($objetosLibro);
$totalPaginas = array_reduce($objetosLibro,
    fn (int $a, Libro $b): int =>
    $a + $b->paginas,
    0
);
echo 'Total de páginas: ' . $totalPaginas;
//Las claves se reenumeran porque asi funciona usort, para mantenerlas se usa uasort,
//La propiedad id no se modifica porque pertenece al objeto