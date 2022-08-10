<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Repositories\category;

use App\Core\CrudRepository;
use App\Models\category;

/** @property category $model */
class categoryRepository extends CrudRepository
{

    public function __construct(category $model)
    {
        parent::__construct($model);
    }

}