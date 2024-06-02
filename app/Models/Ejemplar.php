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
            $fecha_pres = $ejemplar->fecha_hora;
            $diferencia_dias = $now->diffInDays(Carbon::parse($fecha_pres), false);

            if ($diferencia_dias > 30) {
                return 'vencido';
            }
        }

        return 'no vencido';
    }
}
