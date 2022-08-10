<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class product extends CrudModel
{
    protected $guarded = ['id'];
    protected $table='product';
    protected $fillable=['code','name','description','brand','price','id_category'];

    public function category()
    {
        return $this->hasMany(category::class, 'id');
    }

    public function scopeFiltro($query, $request)
    {
        return $query
            ->when($request->code, function ($query, $code) {
                return $query->where('code', 'ilike', $code);
            })
            ->when($request->name, function ($query, $name) {
                return $query->where('name', 'ilike', "%$name%");
            })
            ->when($request->brand, function ($query, $brand) {
                return $query->where('brand', 'ilike', "%$brand%");
            });
    }
}
