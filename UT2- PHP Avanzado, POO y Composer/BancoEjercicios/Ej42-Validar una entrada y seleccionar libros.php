<?php
require_once __DIR__ . '/Ej38-Convertir registros en objetos.php';
function seleccionarDesdeEntrada(array $libros, mixed $entrada): array {
    if (is_string($entrada)){
        $numero = filter_var($entrada, FILTER_VALIDATE_INT);
        if ($numero > 0){
            $filtrado = array_filter($libros,
                        fn (Libro $l): bool =>
                        $l->paginas<=$numero && $l->disponible === true
                        );
            $titulos = array_map(
                        fn (Libro $l): string =>
                        $l->titulo,
                        $filtrado
                        );
            $algunLibroMas400 = array_any($filtrado,
                                fn (Libro $l): bool =>
                                $l->paginas > 400
                                );
            $todasPositivas = array_all($filtrado,
                            fn (Libro $l): bool =>
                            $l->paginas > 0);
            if (empty($libros)){
                echo 'Sin coincidencias';
            };
            if (!empty($titulos)){
                print_r($titulos);
            }
            echo ($algunLibroMas400? 'Hay libros con mas de 400 páginas' . PHP_EOL : 'No hay libros con mas de 400 páginas' . PHP_EOL);
            echo ($todasPositivas? 'Todos los libros tienen páginas positivas' : 'No todos los titulos tienen páginas positivas');
            return $filtrado;
        }    
    }
    echo 'entrada no válida';
    return [];
}
seleccionarDesdeEntrada($objetosLibro, '500');
seleccionarDesdeEntrada($objetosLibro, '0');
seleccionarDesdeEntrada($objetosLibro, 'abc');
seleccionarDesdeEntrada($objetosLibro, ['500']);
seleccionarDesdeEntrada($objetosLibro, '100');
//Si comvirtieramos directamente a (int) estariamos convirtiendo a ciegas, por ejemplo un texto a su numeración en ASCII