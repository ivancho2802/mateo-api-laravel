<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MLocalidades;
use App\Models\MUsuarios;
use App\Models\MAreas;
use App\Models\MFormulario;
//use App\Traits\HasNextSequenceValue;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MKoboFormularios extends Model
{
    use HasFactory; //, HasNextSequenceValue;

    //use HasFactory, SoftDeletes;

    protected $table = 'M_KOBO_FORMULARIOS';

    protected $primaryKey = 'id';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        "ID_M_KOBO_FORMULARIOS",
        "_ID", //relacionado al id de la respuesta del usuario

        "FECHA",
        "FECHA_REGISTRO",
        "ACCION",
        "UNICO",
        "BARCODE",
        "id",
        "ID",
        "ID_EMPRESA",
        "CAMPO1",
        "CAMPO2",
        "CAMPO3",
        "CAMPO4",
        "CAMPO5",
        "ESTATUS",
        "FECHA_FORMULARIO",
        "UID",
        "FUID",
        "CORREO_TEST",
        "FECHA_ESTADISTICA",
        "DEPARTAMENTO",
        "REGION",
        "CORREO",
        "FUNICO",
        "MUNICIPIO",
        "CODIGO_ALERTA",
        "XCODIGO_ALERTA",
        "PREFIJO_ALERTA",

        //RELACIONALES
        "ID_M_LOCALIDADES",
        "ID_M_USUARIOS",
        "ID_M_AREAS",
        "ID_M_FORMULARIOS",
        //RELACIONALES

    ];

    /* 
    CONSTRAINT PK_M_KOBO_FORMULARIOS:
    Unique key (ID, ID_EMPRESA)
    */

    public function localidad()
    {
        return $this->belongsTo(MLocalidades::class, "ID_M_LOCALIDADES", "ID_M_LOCALIDADES");
    }

    public function usuario()
    {
        return $this->hasOne(MUsuarios::class, "ID_M_USUARIOS", "ID_M_USUARIO");
    }

    public function area()
    {
        return $this->hasOne(MAreas::class, "ID_M_AREAS", "ID_M_AREA");
    }

    public function master_f()
    {
        return $this->hasOne(MFormulario::class, "ID_M_FORMULARIOS", "ID_M_FORMULARIOS");
    }

    //trit fallido

    public static function getNextSequenceValue()
    {
        $self = new static();

        /* if (!$self->getIncrementing()) {
            throw new \Exception(sprintf('Model (%s) is not auto-incremented', static::class));
        } */

        $sequenceName = "{$self->getTable()}_ID_seq";

        return DB::selectOne("SELECT nextval('\"{$sequenceName}\"') AS val")->val;
    }

    public function respuesta(): HasOne{
        return $this->hasOne(MKoboRespuestas::class, "_ID", "_ID");
    }

    public function respuestas(): HasMany{
        return $this->hasMany(MKoboRespuestas::class, "_ID", "_ID");
    }
}
