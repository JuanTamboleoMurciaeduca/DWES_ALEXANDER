<?php
declare(strict_types=1);

// TODO M6. Especializa Videojuego con su constructor, plazo y ficha.
class Videojuego extends Juego {
    private string $plataforma;

    public function __construct(
        int $id,
        string $nombre,
        string $Nplataforma
    ){
        parent::__construct($id, $nombre);
        if (trim($Nplataforma)=='') {
            throw new InvalidArgumentException('Plataforma no válida');
        }
        $this->plataforma = trim($Nplataforma);
    }

    public function plataforma():string {
        return $this->plataforma;
    }
    public function plazoMaximo(): int {
        return 7;
    }

    public function ficha():string {
        return parent::ficha() . ' . Jugadores: ' . $this->plataforma;
    }
}

