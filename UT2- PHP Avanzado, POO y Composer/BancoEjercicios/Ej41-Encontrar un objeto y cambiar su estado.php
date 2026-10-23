<?php
//Metodos añadidos al archivo que contiene la clase Libro
require_once __DIR__ . '/Ej38-Convertir registros en objetos.php';

function filtrar (array $array) {
    return array_filter($array,
        fn (Libro $l): bool =>
        $l->disponible === true
    );
}
$disponibles = filtrar($objetosLibro);
$objeto10 = array_find($disponibles,
    fn (Libro $l): bool =>
    $l->id === 10
);
print_r($disponibles);//Muestro los disponibles
if (!empty($objeto10)){
    $objeto10->prestar();
    echo ($objeto10->disponible? 'true' : 'false') . PHP_EOL; //Muestro texto porque el 0 no me aparecia
}
echo $objetosLibro[0]->disponible? 'true' : 'false' . PHP_EOL;//Valor disponible dentro de la coleccion completa
$disponibles = filtrar($disponibles); //Filtro con el valor del objeto cambiado
print_r($disponibles); //Lista actualizada
//Tienen la misma referencia porque no se crea otro objeto diferente, sino que apuntan a la misma direccion en la memoria
$objeto99 = array_find($disponibles,
    fn (Libro $l): bool =>
    $l->id === 99
);
echo ($objeto99?->titulo?? 'Libro no encontrado');