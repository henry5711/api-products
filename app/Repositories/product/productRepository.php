<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Repositories\product;

use App\Core\CrudRepository;
use App\Models\product;

/** @property product $model */
class productRepository extends CrudRepository
{

    public function __construct(product $model)
    {
        parent::__construct($model);
    }

    public function _index($request = null, $user = null)
    {
       $product=product::with('category')->get();
       return $product;
    }

    public function _show($id)
    {
        $product=product::with('category')->where('id',$id)->get();
        return $product;
    }

}
