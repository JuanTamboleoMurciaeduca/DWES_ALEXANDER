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

    public function modalidad(){
        return 'patinete';
    }

    public function tarifaDiaria(){
        return 1000;
    }
}