<?php

final class Libro
{
    public function __construct(
        public string $titulo,
        public bool $disponible = true,
    ) {}
    public function prestar(): void
    {
        $this->disponible = false;
    }
    public function devolver(): void
    {
        $this->disponible = true;
    }
}

$libro1 = new Libro('Dune');
$libro2 = new Libro('Solaris');

var_dump($libro1->disponible);
var_dump($libro2->disponible);

$libro1->prestar();

var_dump($libro1->disponible);
var_dump($libro2->disponible);

$libro1->devolver();

var_dump($libro1->disponible);
var_dump($libro2->disponible);