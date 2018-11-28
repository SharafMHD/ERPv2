<?php

namespace App\Repositories;

use App\Models\courses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class coursesRepository
 * @package App\Repositories
 * @version November 5, 2018, 12:24 pm UTC
 *
 * @method courses findWithoutFail($id, $columns = ['*'])
 * @method courses find($id, $columns = ['*'])
 * @method courses first($columns = ['*'])
*/
class coursesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'descritpion',
        'award_point'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return courses::class;
    }
}
