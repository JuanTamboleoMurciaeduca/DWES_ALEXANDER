<?php

abstract class Alquiler {

    private readonly int $id;
    private string $cliente;
    private int $dias;
    private EstadoAlquiler $estado;
    public function __construct(
        int $id,
        string $cliente,
        int $dias,
        EstadoAlquiler $estado
    ){
        if ($id<0 || trim($cliente) === '' || $dias<1 || $dias > 7){
            throw new InvalidArgumentException('Argumentos inválidos');
        }
        $this->id = $id;
        $this->cliente = trim($cliente);
        $this->dias = $dias;
        $this->estado = $estado;
    }

    public function id(): int{
        return $this->id;
    }

    public function cliente(): string{
        return $this->cliente;
    }

    public function dias(): int{
        return $this->dias;
    }

    public function estado(): EstadoAlquiler{
        return $this->estado;
    }

    abstract public function modalidad(): string;

    abstract protected function tarifaDiaria(): int;

    public function importe(): int{
        return $this->dias() * $this->tarifaDiaria();
    }

    public function iniciar(): void{
        if ($this->estado == EstadoAlquiler::Reservado){
            $this->estado = EstadoAlquiler::Activo;
        } else {
            throw new AlquilerException('Alquiler no reservado');
        }
    }

    public function finalizar(): void{
        if ($this->estado == EstadoAlquiler::Activo){
            $this->estado = EstadoAlquiler::Finalizado;
        } else {
            throw new AlquilerException('Alquiler no activo');
        }
    }
}