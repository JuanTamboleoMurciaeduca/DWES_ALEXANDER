<?php
final class Libro{
    public function __construct(
        public string $titulo = 'Dune',
        public int $paginas = 412
    ){}

    public function ficha() : string { #Este método retorna string asi que debe usar return para ello
        return $this->titulo . ' - ' . $this->paginas;
    }

    public function mostrarFicha() : void { #Este método es void, por lo que puede usar echo sin tener que retornar nada
        echo $this->ficha();
    }
};

$libro = new Libro();

$libro->mostrarFicha();