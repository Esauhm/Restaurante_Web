<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id_producto
 * @property $nombre
 * @property $precio
 * @property $image_url
 * @property $descripcion_prod
 * @property $categoria
 * @property $estado
 *
 * @property Categoria $categoria
 * @property DetallePedido[] $detallePedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'nombre' => 'required',
		'precio' => 'required',
		'image_url' => 'required',
		'descripcion_prod' => 'required',
		'categoria' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','nombre','precio','image_url','descripcion_prod','categoria','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id_categoria', 'categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePedidos()
    {
        return $this->hasMany('App\Models\DetallePedido', 'id_producto', 'id_producto');
    }
    

}
