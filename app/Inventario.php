<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sucursal
 * @property string $comic
 * @property int $cantidad
 * @property string $created_at
 * @property string $updated_at
 * @property Sucursale $sucursale
 */
class Inventario extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'sucursal',
      'comic',
      'cantidad',
      'created_at',
      'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursale()
    {
        return $this->belongsTo('App\Sucursale', 'sucursal');
    }
}
