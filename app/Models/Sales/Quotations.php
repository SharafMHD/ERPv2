<?php

namespace App\Models\Sales;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quotations
 * @package App\Models\Sales
 * @version December 22, 2018, 2:49 pm UTC
 *
 * @property \App\Models\Sales\User user
 * @property \Illuminate\Database\Eloquent\Collection accountingTransactions
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
 * @property \Illuminate\Database\Eloquent\Collection SalesQoutationDetail
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property date date
 * @property string no
 * @property string customer_name
 * @property string customer_phone
 * @property string customer_address
 * @property date valide_date
 * @property string notes
 * @property float amount
 * @property float discount
 * @property float net_amount
 * @property string status
 * @property integer user_id
 */
class Quotations extends Model
{
    use SoftDeletes;

    public $table = 'sales__qoutations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'no' => 'string',
        'customer_name' => 'string',
        'customer_phone' => 'string',
        'customer_address' => 'string',
        'valide_date' => 'date',
        'notes' => 'string',
        'amount' => 'float',
        'discount' => 'float',
        'net_amount' => 'float',
        'status' => 'string',
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
    public function user()
    {
        return $this->belongsTo(\App\Models\Sales\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salesQoutationDetails()
    {
        return $this->hasMany(\App\Models\Sales\SalesQoutationDetail::class);
    }
}
