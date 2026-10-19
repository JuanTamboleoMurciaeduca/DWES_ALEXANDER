<?php
declare(strict_types=1);

// TODO M4. Implementa la base abstracta Juego y las operaciones del préstamo.
abstract class juego implements Prestable {
    use generarEtiqueta;
    
    private int $id;
    private string $nombre;
    private bool $prestado = false;
    private int $dias = 0;

    public function __construct(int $nId, string $nombre) {
        if ($nId <= 0 && trim($nombre) === '') {
            throw new InvalidArgumentException('Argumentos invalidos');
        }
        $this->id = $nId;
        $this->nombre = trim($nombre);
    }

    public function id():int{
        return $this->id;
    }
    public function nombre(): string{
        return $this->nombre;
    }
    public function prestado(): bool{
        return $this->prestado;
    }
    public function dias(): int {
        return $this->dias;
    }

    abstract public function plazoMaximo():int;

    public function ficha(): string {
        $disponible = ($this->prestado ? 'No disponible' : 'Disponible');
        return $this->etiqueta() . ' . ' . $disponible . ' . ' . $this->dias;
    }

    public function prestar(int $dias): void {
        if ($dias <= 0) {
            throw new InvalidArgumentException('Se supera el plazo máximo del juego');
        }
        if ($this->prestado) {
            throw new PrestamoException('El juego ya esta prestado');
        }
        if ($dias > $this->plazoMaximo()) {
            throw new PrestamoException('Supera el plazo máximo');
        }
        $this->prestado = true;
        $this->dias = $dias;
    }

    public function renovar (int $diasExtra): void {
        if ($diasExtra <= 0) {
            throw new InvalidArgumentException('Los días deben ser positivos');
        }
        if (!$this->prestado) {
            throw new PrestamoException('Juego no prestado');
        }
        if ($this->dias + $diasExtra > $this->plazoMaximo()) {
            throw new PrestamoException('Supera plazo máximo');
        }
        $this->dias += $diasExtra;
    }

    public function devolver():void {
        if (!$this->prestado) {
            throw new PrestamoException('Juego no prestado');
        }
        $this->prestado = false;
        $this->dias = 0;
    }
}