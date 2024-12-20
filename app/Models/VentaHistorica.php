<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaHistorica extends Model
{
    use HasFactory;


    protected $table = 'ventas_historicas';

    protected $fillable = [
        'monto_oportunidad',
        'tiempo_oportunidad_dias',
        'numero_interacciones',
        'sector_cliente',
        'productos_ofrecidos',
        'region_cliente',
        'estado_oportunidad', //'estado_oportunidad',
        'canal_contacto',
        'interacciones_previas',
        'presupuesto_cliente',
    ];
    public static function registrarGrafico($monto, $tiempo, $numero, $sector, $productos, $region, $proba, $canal, $inte, $presu)
    {
        self::create([
            'monto_oportunidad' => $monto,
            'tiempo_oportunidad_dias' => $tiempo,
            'numero_interacciones' => $numero,
            'sector_cliente' => $sector,
            'productos_ofrecidos' => $productos,
            'region_cliente' => $region,
            'estado_oportunidad' => $proba, //'estado_oportunidad',
            'canal_contacto' => $canal,
            'interacciones_previas' => $inte,
            'presupuesto_cliente' => $presu,
        ]);
    }
}
