<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class);
    }


    public function cant_ejemplares()
    {
        $ejemplares = Ejemplar::where('libro_id', $this->id)->count();
        return $ejemplares;
    }

    public function nombre_ejemplares()
    {
        $ejemplares = Ejemplar::where('libro_id', $this->id)->get();
        $nombres_ejemplares = '';
        foreach ($ejemplares as $ejemplar) {
            $nombre = $ejemplar->codigo;
            $nombres_ejemplares .= '<li>' . $nombre . '</li>';
        }
        return $nombres_ejemplares ? '<ul>' . $nombres_ejemplares . '</ul>' : 'Sin artistas';
    }


    public function esta_prestado()
    {
        $ejemplares = Ejemplar::where('libro_id', $this->id)->get();
        $nombres_ejemplares = '';
        foreach ($ejemplares as $ejemplar) {
            $nombre = $ejemplar->id;
            $registros = Prestamo::where('ejemplar_id', $nombre)->exists();
            if ($registros) {
                $nombres_ejemplares .= '<li>' . 'prestado' . '</li>';
            } else {
                $nombres_ejemplares .= '<li>' . ' no prestado' . '</li>';
            }
        }
        return $nombres_ejemplares ? '<ul>' . $nombres_ejemplares . '</ul>' : 'Sin ejemplares';
    }


    public function fusiona_cod_prestado()
    {
        $ejemplares = Ejemplar::where('libro_id', $this->id)->get();
        $nombres_ejemplares = '';
        foreach ($ejemplares as $ejemplar) {
            $cod = $ejemplar->codigo;
            $nombre = $ejemplar->id;
            $registros = Prestamo::where('ejemplar_id', $nombre)->exists();
            if ($registros) {
                $nombres_ejemplares .= '<li>' . $cod .'--> prestado' . '</li>';
            } else {
                $nombres_ejemplares .= '<li>' . $cod . '--> no prestado' . '</li>';
            }
        }
        return $nombres_ejemplares ? '<ul>' . $nombres_ejemplares . '</ul>' : 'Sin ejemplares';
    }



    public function fecha_prestamo()
    {
        $ejemplares = Ejemplar::where('libro_id', $this->id)->get();
        $nombres_ejemplares = '';

        foreach ($ejemplares as $ejemplar) {
            $prestamos = Prestamo::where('ejemplar_id', $ejemplar->id)->get();

            if ($prestamos->isNotEmpty()) {
                foreach ($prestamos as $prestamo) {
                    $nombres_ejemplares .= '<li>' . $prestamo->fecha_hora . '</li>';
                }
            } else {
                $nombres_ejemplares .= '<li>sin fecha</li>';
            }
        }

        return $nombres_ejemplares ? '<ul>' . $nombres_ejemplares . '</ul>' : 'Sin ejemplares';
    }
}
