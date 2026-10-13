<?php
// final class Libro
// {
//     public string $titulo;
//     public bool $disponible;
//     public function __construct(
//     string $titulo, bool $disponible = true
//  ) {
//     $this->titulo = $titulo;
//     $this->disponible = $disponible;
//  }
// }

final class Libro {
    public function __construct(
        public string $titulo,
        public bool $disponible = true
    ){}
}

$libro1 = new Libro('Dune');
$libro2 = new Libro('Solaris',false);
// $libro3 = new Libro(); #Esta linea da error, porque Libro pide por lo menos ese argumento en su constructor

echo $libro1->titulo . ' ' . $libro1->disponible . PHP_EOL; #El valor por defecto se aplica en disponible ya que no se añade otro valor al declararlo
echo $libro2->titulo . ' ' . $libro2->disponible; #No muestra disponible porque es false

