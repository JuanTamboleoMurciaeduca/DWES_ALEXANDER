<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/Autor.php';
require_once __DIR__ . '/../src/Categoria.php';
require_once __DIR__ . '/../src/Libro.php';
require_once __DIR__ . '/../src/datos.php';

// Fase 4: convierte los registros de $datos en objetos Libro.
$libros = [];
foreach ($datos as $registro) {
    $autor = $registro['autor'] === null ? null : new Autor($registro['autor']);
    $categoria = new Categoria($registro['categoria']);
    $titulo = $registro['titulo'];
    $id = $registro['id'];
    $disponible = $registro['disponible']; 
    $paginas = $registro['paginas'];
    $libros[] = new Libro($id, $titulo, $paginas, $autor, $categoria, $disponible);
    // Datos del registro, objeto Autor o null y Categoria.
}

// Fase 5: realiza aquí las comprobaciones de préstamos e identidad.
// Añade textos a $mensajes; la vista los mostrará debajo del catálogo.
// Termina devolviendo Dune para conservar el estado inicial del catálogo.
$mensajes = [];

$dune = $libros[0];
$mensajes[] = 'Disponible: '
 . ($dune->disponible ? 'true' : 'false');

$otro = $libros[2];
$mensajes[] = 'Disponible: '
 . ($otro->disponible ? 'true' : 'false');

$dune->prestar();
$mensajes[] = 'Disponible: '
 . ($dune->disponible ? 'true' : 'false');
$mensajes[] = 'Disponible: '
 . ($otro->disponible ? 'true' : 'false');

$dune->devolver();
$mensajes[] = 'Disponible: '
 . ($dune->disponible ? 'true' : 'false');
$mensajes[] = 'Disponible: '
 . ($otro->disponible ? 'true' : 'false');

$mensajes[] = 'Ficha: '
 . ($dune->ficha());

$mensajes[] = 'Ficha: '
 . ($otro->ficha());


$alias = $dune;
$alias->prestar();
$mensajes[] = 'Alias = Dune?: ' . ($alias === $dune ? 'true' : 'false');
$otroLibro = $dune;
$mensajes[] = 'otroLibro = Dune?: ' . ($otroLibro === $dune ? 'true' : 'false');
$dune->devolver();

 // Lectura del formulario facilitada. La búsqueda conserva el texto escrito.
$entrada = $_GET['q'] ?? '';
$entradaBusqueda = is_string($entrada) ? $entrada : '';
$soloDisponibles = isset($_GET['disponibles']);
$ordenEntrada = $_GET['orden'] ?? 'paginas';
$orden = is_string($ordenEntrada)
    && in_array($ordenEntrada, ['paginas', 'titulo'], true)
    ? $ordenEntrada : 'paginas';

// Fase 6.1: normaliza la búsqueda y filtra con array_filter.
$busqueda = mb_strtolower($entradaBusqueda, 'UTF-8');

$libro = array_filter($libros,
    fn (Libro $l) =>
        str_contains(mb_strtolower(trim($l->titulo), 'UTF-8'), $busqueda) || $busqueda === ''
        && (!$soloDisponibles || $l->disponible == 1)
);

$visibles = $libro;

// Fase 6.2: ordena $visibles mediante usort y <=>.

uasort($visibles,
    function (Libro $a, Libro $b) use ($orden):int {
        if ($orden === 'paginas') {
            $compare = $a->paginas <=> $b->paginas;
        } elseif ($orden === 'titulo') {
            $compare = $a->titulo <=> $b->titulo;
        }
        return $compare;
    }
);

// Fase 6.3: resumen del catálogo completo, antes de filtrar.
// Completa disponibles con array_filter y paginas con array_reduce.
$resumen = ['total' => count($libros), 
'disponibles' => count(array_filter($libros, fn (Libro $l) => $l->disponible == 1)), 
'paginas' => array_reduce($libros,
    fn (int $a, Libro $b) => $a + $b->paginas,
    0)
];

// Fase 6.3: crea las fichas de los libros visibles con array_map.
$etiquetas = [];
array_map


// Fase 6.3: busca los ids 30 y 999 con array_find y añade mensajes.

require __DIR__ . '/../vista/catalogo.php';
