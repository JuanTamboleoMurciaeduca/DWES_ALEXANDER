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

//$this y this se usan en ambos lenguajes para llapar a la propia clase
//El punto equivale a -> para acceder a la propiedades o funciones de la clase en la que se usa
//Los constructores funcionan de la misma manera, indicando los argumentos entre los parentesis y haciendo los cambios entre las llaves
//En PHP las clases son publicas por defecto