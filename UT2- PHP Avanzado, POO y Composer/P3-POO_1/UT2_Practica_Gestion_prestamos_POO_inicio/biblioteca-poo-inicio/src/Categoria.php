<?php
declare(strict_types=1);

final class Categoria
{
    public string $nombre;

    public function __construct(string $nom){
        $this->nombre = $nom;
    }
    // Fase 2: propiedad pública nombre y constructor. ///Hecho
}
