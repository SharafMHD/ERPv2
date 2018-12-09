<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\transactions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class transactionsRepository
 * @package App\Repositories\Accounting
 * @version December 5, 2018, 11:40 am UTC
 *
 * @method transactions findWithoutFail($id, $columns = ['*'])
 * @method transactions find($id, $columns = ['*'])
 * @method transactions first($columns = ['*'])
*/
class transactionsRepository extends BaseRepository
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
        return transactions::class;
    }
}
