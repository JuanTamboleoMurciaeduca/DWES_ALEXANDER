<?php
$datos = [
 'titulo' => 'Dune',
 'autor' => 'Frank Herbert',
 'paginas' => 412,
 'disponible' => true,
];

final class libro {
    public String $titulo;
    public String $autor;
    public Int $paginas;
    public bool $disponible;

    public function __construct(string $tit, string $au, int $pa, bool $dis) {
        $this->titulo = $tit;
        $this->autor = $au;
        $this->paginas = $pa;
        $this->disponible = $dis;
    }
}

$libro = new Libro('Dune','Frank Herbert',412,true);
echo $libro->titulo . PHP_EOL;
echo $libro->autor . PHP_EOL;
echo $libro->paginas . PHP_EOL;
echo $libro->disponible . PHP_EOL;