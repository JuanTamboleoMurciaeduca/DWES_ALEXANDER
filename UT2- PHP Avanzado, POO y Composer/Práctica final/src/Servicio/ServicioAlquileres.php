<?php

class ServicioAlquileres
{
    public function __construct(private array $alquileres) {}

    public function todos(): array
    {
        return $this->alquileres;
    }

    public function consultar(string $texto = '', ?EstadoAlquiler $estado = null): array
    {
        // $filtrado = [];
        // // Esta misma comprobación ya la hace el str_contains
        // if ($this->normalizar($texto) !== '') {
        //     $filtrado = array_filter(
        //         $this->alquileres,
        //         // No normalizas -0,25
        //         fn(Alquiler $a): bool => str_contains($a->cliente(), $this->normalizar($texto))
        //     );
        // }
        // if ($estado !== null) {
        //     // Tendrás que comprobar estado del alquiler, no? -0,5
        //     if ($estado === EstadoAlquiler::$estado) {
        //         $filtrado = array_filter(
        //             $this->alquileres,
        //             // Esto de aquí
        //             fn(Alquiler $a): bool => $this->estado() === EstadoAlquiler::$estado
        //         );
        //     }
        // }
        // // No hace falta comprobarlo
        // if (!empty($filtrado)) {
        //     // usort no devuelve un array, devuelve true -0,5
        //     $ordenado = usort($filtrado, function (Alquiler $a, Alquiler $b) {
        //         if ($a->importe() === $b->importe()) {
        //             $a->id() <=> $b->id();
        //         }
        //         $a->importe() <=> $b->importe();
        //     });
        //     $resultado = array_values($ordenado);
        //     return $resultado;
        // }

        // return $filtrado;
        $texto = $this->normalizar($texto);

        // Mejor usar un array_filter
        $filtro = array_filter(
            $this->todos(),
            fn(Alquiler $a): bool =>
            str_contains(
                $this->normalizar($a->cliente()),
                $texto
            )
                && ($estado === null || $a->estado() === $estado)
        );

        usort(
            $filtro,
            fn(Alquiler $a, Alquiler $b): int => ($a->importe() <=> $b->importe()) === 0
                ? $a->id() <=> $b->id()
                : $a->importe() <=> $b->importe()
        );

        return $filtro;
    }

    // Hay que llamarla con $this -0,25
    private function normalizar(string $texto): string
    {
        return mb_strtolower(trim($texto), 'UTF-8');
    }

    public function resumir(array $alquileres): array
    {
        // if (empty($alquileres)) {
        //     return [
        //         cantidad => 0,
        //         importe => 0
        //     ];
        // }
        // $cantidad = count($alquileres);
        // Bien visto del array_reduce, aunque necesitamos guardar dos datos, por lo tanto el carry será un array
        $importe = array_reduce(
            $alquileres,
            fn(array $carry, Alquiler $a): array => [
                'cantidad' => $carry['cantidad'] + 1,
                'importe' => $carry['importe'] + $a->importe()
            ],
            ['cantidad' => 0, 'importe' => 0]
        );
        return $importe;
    }
}
