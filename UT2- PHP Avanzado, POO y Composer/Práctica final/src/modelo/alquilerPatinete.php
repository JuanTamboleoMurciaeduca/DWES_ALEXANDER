<?php

class AlquilerPatinete extends Alquiler {
    public function __construct(
        int $id,
        string $cliente,
        int $dias,
        EstadoAlquiler $estado
    ){
        parent::__construct($id, $cliente, $dias, $estado);
    }

    public function modalidad(): string {
        return 'patinete';
    }

    public function tarifaDiaria(): int{
        return 1000;
    }
}