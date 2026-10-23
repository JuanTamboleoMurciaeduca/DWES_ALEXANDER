<?php

abstract class Alquiler
{
    // Mejor promoción
    public function __construct(
        private readonly int $id,
        private string $cliente,
        private int $dias,
        private EstadoAlquiler $estado
    ) {
        if ($id <= 0 || trim($cliente) === '' || $dias < 1 || $dias > 7) {
            // Suele ser mejor no poner un solo throw y aclarar qué falla en concreto.
            throw new InvalidArgumentException('Argumentos inválidos');
        }
        $this->cliente = trim($cliente);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function cliente(): string
    {
        return $this->cliente;
    }

    public function dias(): int
    {
        return $this->dias;
    }

    public function estado(): EstadoAlquiler
    {
        return $this->estado;
    }

    abstract public function modalidad(): string;

    abstract protected function tarifaDiaria(): int;

    public function importe(): int
    {
        return $this->dias() * $this->tarifaDiaria();
    }

    public function iniciar(): void
    {
        if ($this->estado == EstadoAlquiler::Reservado) {
            $this->estado = EstadoAlquiler::Activo;
        } else {
            throw new AlquilerException('Alquiler no reservado');
        }
    }

    public function finalizar(): void
    {
        if ($this->estado == EstadoAlquiler::Activo) {
            $this->estado = EstadoAlquiler::Finalizado;
        } else {
            throw new AlquilerException('Alquiler no activo');
        }
    }
}
