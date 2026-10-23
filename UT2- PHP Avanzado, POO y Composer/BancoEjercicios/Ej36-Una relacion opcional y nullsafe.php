<?php

class Autor {
    public function __construct(public string $nombre){}
}

final class Libro {
    public function __construct(
        public string $titulo,
        public ?Autor $autor = null
    ){}
}

$conAutor = new Libro('Dune', new Autor('Frak Herbert'));
$sinAutor = new Libro('Relato anónimo');
echo $conAutor->titulo . ' . ' . $conAutor->autor?->nombre . PHP_EOL; //Si autor existe muestra su nombre, si no, no intenta leer la propiedad ya que puede no existir
echo $sinAutor->titulo . ' . ' . ($sinAutor->autor?->nombre?? 'Sin autor'); //Aqui hace lo mismo que antes, pero al dar null, se devuelve el string 'Sin autor'