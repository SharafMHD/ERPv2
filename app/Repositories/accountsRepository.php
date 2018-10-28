<?php

namespace App\Repositories;

use App\Models\accounts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class accountsRepository
 * @package App\Repositories
 * @version October 27, 2018, 7:37 pm UTC
 *
 * @method accounts findWithoutFail($id, $columns = ['*'])
 * @method accounts find($id, $columns = ['*'])
 * @method accounts first($columns = ['*'])
*/
class accountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no',
        'name',
        'main_account',
        'description',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return accounts::class;
    }
}
