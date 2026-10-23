<?php

class AlquilerBicicleta extends Alquiler {
    public function __construct(
        int $id,
        string $cliente,
        int $dias,
        EstadoAlquiler $estado
    ){
        parent::__construct($id, $cliente, $dias, $estado);
    }

    // Falta el tipo de retorno -0,5
    public function modalidad(): string {
        return 'bicicleta';
    }

    public function tarifaDiaria(): int{
        return 500;
    }
}