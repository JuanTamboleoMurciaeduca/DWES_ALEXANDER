<?php
declare(strict_types=1);

// TODO M7. Implementa la especialización final de pago y su constructor.
final class ActividadPago extends Actividad {
    public function __construct (
        private readonly int $id,
        private readonly string $nombre,
        private readonly int $capacidad,
        private int $ocupadas,
        private readonly EstadoActividad $estado,
        private readonly ?Responsable $responsable,

        private readonly int $precioCentimos
    ){
        parent::__construct($id, $nombre, $capacidad, $ocupadas, $estado, $responsable);
        if ($precioCentimos<1){
            throw new InvalidArgumentException('Precio inválido');
        }
    }

    public function tipo(): string {
        return 'pago';
    }

    public function importe(int $cantidad): int{
        if ($cantidad < 0){
            throw new InvalidArgumentException('Cantidad inválida');
        }
        return $cantidad * $this->precioCentimos;
    }
}
