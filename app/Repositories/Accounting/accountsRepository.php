<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\accounts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class accountsRepository
 * @package App\Repositories\Accounting
 * @version December 4, 2018, 11:18 am UTC
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
