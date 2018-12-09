<?php

namespace App\Models\Accounting;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class transactions
 * @package App\Models\Accounting
 * @version December 5, 2018, 11:40 am UTC
 *
 * @property \App\Models\Accounting\AccountingAccount accountingAccount
 * @property \App\Models\Accounting\User user
 * @property \Illuminate\Database\Eloquent\Collection hrAttendances
 * @property \Illuminate\Database\Eloquent\Collection hrBonuses
 * @property \Illuminate\Database\Eloquent\Collection hrCertifications
 * @property \Illuminate\Database\Eloquent\Collection hrCoursesDetails
 * @property \Illuminate\Database\Eloquent\Collection hrEmployeeLeaves
 * @property \Illuminate\Database\Eloquent\Collection hrPayrolls
 * @property \Illuminate\Database\Eloquent\Collection hrSalaryProfiles
 * @property \Illuminate\Database\Eloquent\Collection hrTrainingMembers
 * @property \Illuminate\Database\Eloquent\Collection inventoryDetails
 * @property \Illuminate\Database\Eloquent\Collection inventoryItems
 * @property \Illuminate\Database\Eloquent\Collection inventoryMovementDetails
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrders
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection projectWorkGroupMembers
 * @property \Illuminate\Database\Eloquent\Collection purchasePurchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection salesQoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property date date
 * @property string no
 * @property integer account_id
 * @property string transaction_type
 * @property float credit
 * @property float debit
 * @property string pay_type
 * @property string description
 * @property string cheque_no
 * @property date cheque_date
 * @property string cheque_bank
 * @property string cheque_status
 * @property string ref_no
 * @property integer user_id
 */
class transactions extends Model
{
    use SoftDeletes;

    public $table = 'accounting__transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'no' => 'string',
        'account_id' => 'integer',
        'transaction_type' => 'string',
        'credit' => 'float',
        'debit' => 'float',
        'pay_type' => 'string',
        'description' => 'string',
        'cheque_no' => 'string',
        'cheque_date' => 'date',
        'cheque_bank' => 'string',
        'cheque_status' => 'string',
        'ref_no' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function accountingAccount()
    {
        return $this->belongsTo(\App\Models\Accounting\AccountingAccount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Accounting\User::class);
    }
}
