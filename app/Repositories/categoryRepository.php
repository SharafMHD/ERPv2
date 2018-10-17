<?php

namespace App\Repositories;

use App\Models\category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version October 17, 2018, 1:35 pm UTC
 *
 * @method category findWithoutFail($id, $columns = ['*'])
 * @method category find($id, $columns = ['*'])
 * @method category first($columns = ['*'])
*/
class categoryRepository extends BaseRepository
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
        return category::class;
    }
}
