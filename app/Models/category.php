<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class category extends CrudModel
{
    protected $guarded = ['id'];
    protected $table='category';
    protected $fillable=['name','active'];

}
