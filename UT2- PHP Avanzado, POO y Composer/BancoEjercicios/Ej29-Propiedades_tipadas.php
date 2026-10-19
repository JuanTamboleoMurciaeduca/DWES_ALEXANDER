<?php

final class Libro { #Al usar final en la clase, prohibe que otras clases hereden de esta
    public string $titulo = 'Solaris';
    public int $paginas = 216;
    public bool $disponible = true;
}

$libro = new Libro();
#echo $libro->titulo; /Da error si no tiene nombre por defecto
echo $libro->titulo . PHP_EOL;
$libro->titulo = 'otro titulo';
echo $libro->titulo;