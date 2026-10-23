<?php

class ServicioAlquileres {
    private array $alquileres;
    public function __construct(array $alquileres){
        $this->alquileres = $alquileres;
    }

    public function todos(): array {
        return $this->alquileres;
    }

    public function consultar(string $texto = '', ?EstadoAlquiler $estado = null): array{
        $filtrado=[];
        if (normalizar($texto)!== ''){
            $filtrado=array_filter($this->alquileres,
            fn (Alquiler $a): bool => str_contains($a->cliente(), normalizar($texto)));
        }
        if ($estado !== null){
            if ($estado === EstadoAlquiler::$estado) {
                $filtrado=array_filter($this->alquileres,
                fn (Alquiler $a): bool => $this->estado() === EstadoAlquiler::$estado);
            }
        }
        if (!empty($filtrado)){
            $ordenado = usort($filtrado, function (Alquiler $a, Alquiler $b) {
                if ($a->importe() === $b->importe()){
                    $a->id() <=> $b->id();
                }
                $a->importe() <=> $b->importe();
            });
            $resultado = array_values($ordenado);
            return $resultado;
        }
        return $filtrado;
    }

    private function normalizar(string $texto): string{
        return mb_strtolower(trim($texto), 'UTF-8');
    }

    public function resumir(array $alquileres): array{
        if (empty($alquileres)){
            return [
                cantidad => 0,
                importe => 0
            ];
        }
        $cantidad = count($alquileres);
        $importe = array_reduce($alquileres, fn (int $a, Alquiler $b): int => $a + $b->impote(), 0);
        return [
            cantidad => $cantidad,
            importe => $importe
        ];
    }
}