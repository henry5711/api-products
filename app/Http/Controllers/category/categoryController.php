<?php

namespace App\Http\Controllers\category;

use Illuminate\Http\Request;
use App\Core\CrudController;
use App\Services\category\categoryService;
/** @property categoryService $service */
class categoryController extends CrudController
{
    public function __construct(categoryService $service)
    {
        parent::__construct($service);
    }
}