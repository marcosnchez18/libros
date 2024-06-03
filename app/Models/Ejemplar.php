<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;

    protected $table = 'ejemplares';

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }



    public function esta_vencido()
    {
        $now = Carbon::now();
        $ejemplares = Prestamo::where('ejemplar_id', $this->id)->get();

        foreach ($ejemplares as $ejemplar) {
            $fecha_pres = Carbon::parse($ejemplar->fecha_hora);
            $diferencia_dias = $fecha_pres->diffInDays($now, false);

            // Si la diferencia es mayor a 30 días y es positiva (el préstamo está vencido)
            if ($diferencia_dias > 30) {
                return 'vencido';
            }
        }

        return 'no vencido';
    }



}
