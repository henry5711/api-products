<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Services\category;


use App\Core\CrudService;
use App\Repositories\category\categoryRepository;

/** @property categoryRepository $repository */
class categoryService extends CrudService
{

    protected $name = "category";
    protected $namePlural = "categories";

    public function __construct(categoryRepository $repository)
    {
        parent::__construct($repository);
    }

}