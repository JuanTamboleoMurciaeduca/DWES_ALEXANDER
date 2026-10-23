<?php
final class Libro {
    public function __construct(
        public string $titulo,
        public int $paginas
    ){
        $trimTitulo = trim($titulo);
        $tit = preg_replace('/\s+/',' ', $trimTitulo);
        if ($tit === '' || $paginas <= 0){
            throw new InvalidArgumentException('Argumentos invalidos');
        }
    }
}

$libro = new Libro('Dune', 412);
try {
    $libro2 = new Libro('',100);
} catch (InvalidArgumentException $e) {
    echo "Error al crear libro2" . ' . ' . $e->getMessage() . PHP_EOL;
}
try {
    $libro3 = new Libro('Solaris',-5);
} catch (InvalidArgumentException $e) {
    echo "Erro al crear libro3" . ' . ' . $e->getMessage() . PHP_EOL;
}
$libro->paginas = 0;
echo 'Paginas de libro: ' . $libro->paginas;

//Validar al construir no impide que despues de construir modifique la variable a mi gusto sin tener en cuenta la norma