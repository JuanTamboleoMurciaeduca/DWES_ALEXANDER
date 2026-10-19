<?php
final class Libro {
    public function __construct(public string $titulo) {}
}

$original = new Libro('Dune'); #titulo = Dune
$alias = $original; #alias apunta al objeto original
$otro = new Libro('Dune'); #libro diferente otro
$alias->titulo = 'Solaris'; #Cambia titulo de alias, por lo que original tambien se modifica

echo $original->titulo . PHP_EOL; #Muestra el titulo modificado
echo $otro->titulo . PHP_EOL; #Muestra el titulo del libro independiente
var_dump($original === $alias); #Es igual, ya que apuntan al mismo objeto
var_dump($original === $otro); #No es igual, ya que original se modifico mediante alias