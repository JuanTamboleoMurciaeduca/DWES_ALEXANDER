<?php
declare(strict_types=1);

require_once __DIR__ . '/Autor.php';
require_once __DIR__ . '/Categoria.php';
require_once __DIR__ . '/Libro.php';

// // Fase 2.1: crea aquí un Autor y una Categoria y muestra sus nombres. ///Hecho
// $autor = new Autor('Frank Herbert');
// $categoria = new Categoria('Ciencia Ficción');

// echo $autor->nombre . PHP_EOL;
// echo $categoria->nombre . PHP_EOL;

// // Fase 2.2: cuando completes Libro.php, añade su require_once arriba. ///Hecho
// // Después crea los dos libros y muestra su disponibilidad.

// $libro1 = new Libro(10,'Dune',412,$autor,$categoria);

// echo ($libro1->disponible ? 'true' : 'false') . PHP_EOL;

// $libro2 = new Libro(10,'Dune',412,$autor,$categoria,false);

// echo ($libro2->disponible ? 'true':'false') . PHP_EOL;


// Fase 3.2: sustituye las pruebas anteriores por un Libro construido
// con las variables $titulo y $paginas. Muestra ambas propiedades.
$autor = new Autor('Pepe');
$categoria = new Categoria('Terror');

$libro1 = new Libro(10,'Dune',412,$autor,$categoria);
$libro2 = new Libro(20,' Dune ',412,$autor,$categoria);
$libro3 = new Libro(30,'',100,$autor,$categoria);
$libro4 = new Libro(40,'    ',100,$autor,$categoria);
$libro5 = new Libro(50,'Solaris',0,$autor,$categoria);
$libro6 = new Libro(60,'Solaris',-5,$autor,$categoria);
$libro7 = new Libro(70,'    ',0,$autor,$categoria);

echo $libro1->titulo . PHP_EOL;
echo $libro1->paginas . PHP_EOL;

echo $libro2->titulo . PHP_EOL;
echo $libro2->paginas . PHP_EOL;

echo $libro3->titulo . PHP_EOL;
echo $libro3->paginas . PHP_EOL;

echo $libro4->titulo . PHP_EOL;
echo $libro4->paginas . PHP_EOL;

echo $libro5->titulo . PHP_EOL;
echo $libro5->paginas . PHP_EOL;

echo $libro6->titulo . PHP_EOL;
echo $libro6->paginas . PHP_EOL;

echo $libro7->titulo . PHP_EOL;
echo $libro7->paginas . PHP_EOL;