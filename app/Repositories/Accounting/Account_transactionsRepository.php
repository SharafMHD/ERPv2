<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\Account_transactions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Account_transactionsRepository
 * @package App\Repositories\Accounting
 * @version December 5, 2018, 10:51 am UTC
 *
 * @method Account_transactions findWithoutFail($id, $columns = ['*'])
 * @method Account_transactions find($id, $columns = ['*'])
 * @method Account_transactions first($columns = ['*'])
*/
class Account_transactionsRepository extends BaseRepository
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
        return Account_transactions::class;
    }
}
