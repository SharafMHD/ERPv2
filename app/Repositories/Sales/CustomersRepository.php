<?php

namespace App\Repositories\Sales;

use App\Models\Sales\Customers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CustomersRepository
 * @package App\Repositories\Sales
 * @version December 22, 2018, 2:53 pm UTC
 *
 * @method Customers findWithoutFail($id, $columns = ['*'])
 * @method Customers find($id, $columns = ['*'])
 * @method Customers first($columns = ['*'])
*/
class CustomersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no',
        'name',
        'type',
        'phone',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Customers::class;
    }
}
