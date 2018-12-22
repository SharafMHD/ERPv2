<?php

namespace App\Repositories\Sales;

use App\Models\Sales\Quotations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QuotationsRepository
 * @package App\Repositories\Sales
 * @version December 22, 2018, 2:49 pm UTC
 *
 * @method Quotations findWithoutFail($id, $columns = ['*'])
 * @method Quotations find($id, $columns = ['*'])
 * @method Quotations first($columns = ['*'])
*/
class QuotationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'no',
        'customer_name',
        'customer_phone',
        'customer_address',
        'valide_date',
        'notes',
        'amount',
        'discount',
        'net_amount',
        'status',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quotations::class;
    }
}
