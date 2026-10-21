<?php
require_once __DIR__ . '/Ej38-Convertir registros en objetos.php';

$busqueda = ' DRá';

$arrayFiltrado = array_filter($objetosLibro,
    fn (Libro $l): bool =>
    str_contains(
        mb_strtolower(trim($l->titulo), 'UTF-8'), 
        mb_strtolower(trim($busqueda), 'UTF-8')
    )
);

$etiqueta = array_map(
    fn (Libro $l): string =>
    $l->titulo . ' - ' . $l->paginas . ' páginas',
    $arrayFiltrado
);

if (empty($etiqueta)){
    echo 'Sin resultados';
} else {
    print_r($etiqueta);
}