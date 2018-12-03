<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\categories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class categoriesRepository
 * @package App\Repositories\Inventory
 * @version December 3, 2018, 10:09 am UTC
 *
 * @method categories findWithoutFail($id, $columns = ['*'])
 * @method categories find($id, $columns = ['*'])
 * @method categories first($columns = ['*'])
*/
class categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return categories::class;
    }
}
