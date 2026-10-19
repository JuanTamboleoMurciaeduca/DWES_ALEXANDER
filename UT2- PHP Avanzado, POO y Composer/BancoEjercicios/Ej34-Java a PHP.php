<?php
// public final class Libro {
//     public String titulo;
//     public boolean disponible;
    
//     public Libro(String titulo) {
//         this.titulo = titulo;
//         this.disponible = true;
//     }
//     public void prestar() {
//         this.disponible = false;
//     }
// }

final class Libro { #No hay public porque las clases seran públicas por defecto
    public function __construct(
        public string $titulo,
        public bool $disponible = true
    ){}

    public function prestar() : void {
        $this->disponible = false;
    }
}

$libro = new Libro('Dune');

var_dump($libro->disponible);

$libro->prestar();

var_dump($libro->disponible);