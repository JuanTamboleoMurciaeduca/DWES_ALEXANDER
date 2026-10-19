<?php
class Autor {
    public function __construct(public string $nombre){}
}

class Categoria {
    public function __construct(public string $nombre){}
}

class Libro {
    public function __construct(
        public string $nombre,
        public Autor $autor,
        public Categoria $categoria
    ){}
}

$autor = new Autor('Frank Herbert');
$categoria = new Categoria('Ciencia ficción');

$libro = new Libro('Dune', $autor, $categoria);
echo $libro->titulo . PHP_EOL;
echo $libro->autor->nombre . PHP_EOL;
echo $libro->categoria->nombre . PHP_EOL;
//Es mejor poner autor como un objeto porque las propiedades se guardan en la clase Autor, por lo que se satura menos el codigo dentro de libro
//y ademas evita causar errores por no crear bien la clase Autor, ya que dentro de su clase se pondrian las normas que debe seguir para crearlo