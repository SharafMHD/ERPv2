<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\deposit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class depositRepository
 * @package App\Repositories\Accounting
 * @version December 5, 2018, 11:46 am UTC
 *
 * @method deposit findWithoutFail($id, $columns = ['*'])
 * @method deposit find($id, $columns = ['*'])
 * @method deposit first($columns = ['*'])
*/
class depositRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'no',
        'account_id',
        'transaction_type',
        'credit',
        'debit',
        'pay_type',
        'description',
        'cheque_no',
        'cheque_date',
        'cheque_bank',
        'cheque_status',
        'ref_no',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return deposit::class;
    }
}
