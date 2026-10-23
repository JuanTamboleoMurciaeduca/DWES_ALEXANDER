<?php
declare(strict_types=1);

function entrada(array $origen, string $clave, string $defecto = ''): string
{
    // TODO F1. Lee solo cadenas y aplica el valor por defecto.
    throw new LogicException("Pendiente: entrada.");
}

function enteroPositivo(string $valor): int
{
    // TODO F2. Valida antes de convertir; rechaza con InvalidArgumentException.
    throw new LogicException("Pendiente: enteroPositivo.");
}

function limpiarEspacios(string $texto): string
{
    return preg_replace('/\s+/u', ' ', trim($texto)) ?? '';
}

function normalizar(string $texto): string
{
    return mb_strtolower(limpiarEspacios($texto), 'UTF-8');
}

function buscarPorId(array $actividades, int $id): ?Actividad
{
    // TODO F3. Usa array_find con un callback tipado.
    return array_find($actividades, 
            fn ($a): Actividad => $a->id() === $id);
}

function filtrarActividades(
    array $actividades, string $texto, string $tipo,
    ?EstadoActividad $estado, bool $soloDisponibles
): array {
    // TODO F4. Combina las cuatro condiciones mediante array_filter.
    $nombre = normalizar($texto);
    $filtrado = array_filter(function ($act) {
        if ($nombre !== '') {
            if (str_contains($nombre, normalizar($act->nombre())) === false) {
                return false;
            }
        }
        if ($tipo !== '') {
            if ($act->tipo() !== 'gratuita' || $act->tipo() !== 'pago') {
                return false;
            }
        }
        if ($estado !== null){
            if ($estado !== EstadoActividad::Cerrada || $estado !== EstadoActividad::Abierta) {
                return false;
            }
        }
        if ($soloDisponibles === true) {
            if ($act->estado() !== EstadoActividad::Abierta || $act->PlazasLibres() < 0){
                return false;
            }
        }
        return true;
    },
    $actividades
    );

    return array_values($filtrado);
}

function ordenarActividades(array $actividades, string $orden): array
{
    // TODO F5. Ordena una copia con usort y desempata por id.
    throw new LogicException("Pendiente: ordenarActividades.");
    if ($orden === 'libres') {
        return usort($actividades,
        fn (Actividad $a, Actividad $b) => $a->
        )
    } elseif ($orden === 'nombre') {

    }
}

function transformarActividades(array $actividades, callable $transformacion): array
{
    return array_map($transformacion, $actividades);
}

function generarEtiquetas(
    array $actividades, string $prefijo = 'Actividad: '
): array
{
    // TODO F6. Usa transformarActividades y una closure con use.
    throw new LogicException("Pendiente: generarEtiquetas.");
}

function resumirActividades(array $actividades): array
{
    // TODO F7. Calcula las cinco magnitudes con array_reduce.
    throw new LogicException("Pendiente: resumirActividades.");
}

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function euros(int $centimos): string
{
    return number_format($centimos / 100, 2, ',', '.') . ' €';
}
