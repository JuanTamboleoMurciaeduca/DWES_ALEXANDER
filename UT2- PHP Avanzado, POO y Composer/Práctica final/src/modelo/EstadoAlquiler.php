<?php

enum EstadoAlquiler: string {
    case Reservado = 'reservado';
    case Finalizado = 'finalizado';
    case Activo = 'activo';
}