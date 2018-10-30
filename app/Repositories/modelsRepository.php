<?php

namespace App\Repositories;

use App\Models\models;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class modelsRepository
 * @package App\Repositories
 * @version October 27, 2018, 7:09 pm UTC
 *
 * @method models findWithoutFail($id, $columns = ['*'])
 * @method models find($id, $columns = ['*'])
 * @method models first($columns = ['*'])
*/
class modelsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'label',
        'parent',
        'icon'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return models::class;
    }
}
