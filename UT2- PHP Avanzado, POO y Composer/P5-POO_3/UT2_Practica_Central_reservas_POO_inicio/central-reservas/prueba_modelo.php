<?php
require_once __DIR__ . '/src/cargar.php';
require_once __DIR__ . '/src/datos.php';

$actividades =  crearActividades();
print_r($actividades);
$act101 = array_find($actividades,
        fn (Actividad $a) => 101 === $a->id());
var_dump($act101);

$act103 = array_find($actividades,
        fn (Actividad $a) => 103 === $a->id());
var_dump($act103);

$act104 = array_find($actividades,
        fn (Actividad $a) => 104 === $a->id());
var_dump($act104);

echo $act101->importe(2) . PHP_EOL;
echo $act103->importe(2) . PHP_EOL;

echo ($act101->responsable() === $act103->responsable()? 'Responsables identicos' : 'Responsables no identicos') . PHP_EOL;

echo ($act104->responsable()?? 'Responsable null') . PHP_EOL;

try {
    $act101->responsable = new Responsable(5, 'Pepe');
} catch (Error $e) {
    echo 'Error al modificar responsable: ' . $e->getMessage();
}

