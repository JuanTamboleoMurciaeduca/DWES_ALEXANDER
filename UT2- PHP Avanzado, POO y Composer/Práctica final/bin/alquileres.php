<?php
require_once __DIR__ . '/../src/modelo/cargar.php';

$alquileres = [
    new AlquilerBicicleta(501, 'Lucía Torres', 'bicicleta', 2, 'reservado'),
    new AlquilerPatinete(502, 'Álex Ruiz', 'patinete', 2, 'activo'),
    new AlquilerBicicleta(503, 'Óscar Gil', 'bicicleta', 3, 'finalizado'),
    new AlquilerPatinete(504, 'Lucía Molina', 'patinete', 1, 'reservado')
];

function mostrar(string $titulo, array $alquileres,
    ServicioAlquileres $servicio): void {
        echo $titulo . PHP_EOL;
            if ($alquileres === []) {
                echo 'Sin resultados' . PHP_EOL;
            }
        foreach ($alquileres as $a) {
                echo $a->id() . ' | ' . $a->cliente() . ' | ' . $a->modalidad()
                . ' | días: ' . $a->dias() . ' | ' . $a->estado()->value
                . ' | ' . $a->importe() . ' céntimos' . PHP_EOL;
            }
        $resumen = $servicio->resumir($alquileres);
        echo 'Cantidad: ' . $resumen['cantidad']
            . ' | Importe: ' . $resumen['importe'] . ' céntimos'
            . PHP_EOL . PHP_EOL;
}