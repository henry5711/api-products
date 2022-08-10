<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Services\product;


use App\Core\CrudService;
use App\Repositories\product\productRepository;
use Illuminate\Http\Request;

/** @property productRepository $repository */
class productService extends CrudService
{

    protected $name = "product";
    protected $namePlural = "products";

    public function __construct(productRepository $repository)
    {
        parent::__construct($repository);
    }

    public function _store(Request $request)
    {
       $verifiCode=is_string($request->code) && preg_match("/^[a-zA-Z0-9]+$/", $request->code);
       if($verifiCode !=true)
       {
        return response()->json(["error"=>true,"message"=>"el codigo no debe tener espacios o caracteres especiales"],400);
       }

       if(strlen($request->code) < 4 || strlen($request->code) > 10 )
       {
        return response()->json(["error"=>true,"message"=>"el codigo debe tener al menos 4 caracteres o maximo 10"],400);
       }

       if(strlen($request->name) < 4  )
       {
        return response()->json(["error"=>true,"message"=>"el nombre debe tener al menos 4 caracteres "],400);
       }

       if ($request->code ==$request->name) {
        return response()->json(["error"=>true,"message"=>"el codigo y el nombre no pueden ser iguales"],400);
       }

       if ($request->price <0) {
        return response()->json(["error"=>true,"message"=>"el precio debe ser un numero valido"],400);
       }

       return parent::_store($request);
    }

    public function _update($id, Request $request)
    {

        $verifiCode=is_string($request->code) && preg_match("/^[a-zA-Z0-9]+$/", $request->code);
        if($verifiCode !=true)
        {
         return response()->json(["error"=>true,"message"=>"el codigo no debe tener espacios o caracteres especiales"],400);
        }

        if(strlen($request->code) < 4 || strlen($request->code) > 10 )
        {
         return response()->json(["error"=>true,"message"=>"el codigo debe tener al menos 4 caracteres o maximo 10"],400);
        }

        if(strlen($request->name) < 4  )
        {
         return response()->json(["error"=>true,"message"=>"el nombre debe tener al menos 4 caracteres "],400);
        }

        if ($request->code ==$request->name) {
         return response()->json(["error"=>true,"message"=>"el codigo y el nombre no pueden ser iguales"],400);
        }

        if ($request->price <0) {
         return response()->json(["error"=>true,"message"=>"el precio debe ser un numero valido"],400);
        }

        return parent::_update($id,$request);
    }


}
