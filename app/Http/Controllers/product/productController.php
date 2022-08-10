<?php

namespace App\Http\Controllers\product;

use Illuminate\Http\Request;
use App\Core\CrudController;
use App\Models\product;
use App\Services\product\productService;
use Carbon\Carbon;

/** @property productService $service */
class productController extends CrudController
{
    public function __construct(productService $service)
    {
        parent::__construct($service);
    }

    public function filter(Request $request){
      $filter=product::filtro($request)->get();
      return ["list"=>$filter,"total"=>count($filter)];
    }

    public function report(Request $request){

        $product=product::filtro($request)->get();
        $day=Carbon::now();
        header('Content-Type: application/vnd.ms-excel');
        header ("Content-Disposition: attachment; filename=reporte_productos.xls");
        header('Cache-Control: max-age=0');

               return  view('report',['data' =>$product,
               'fec' => $day
              ]);
    }
}
