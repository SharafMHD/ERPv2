<?php

namespace App\Models\Sales;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sales__qoutation_details
 * @package App\Models\Sales
 * @version December 30, 2018, 5:10 pm UTC
 *
 * @property \App\Models\Sales\InventoryItem inventoryItem
 * @property \App\Models\Sales\SalesQoutation salesQoutation
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
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property integer item_id
 * @property float qty
 * @property float price
 * @property float total
 * @property string description
 * @property integer qoutation_id
 */
class sales__qoutation_details extends Model
{
    use SoftDeletes;

    public $table = 'sales__qoutation_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'item_id',
        'qty',
        'price',
        'total',
        'description',
        'qoutation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item_id' => 'integer',
        'qty' => 'float',
        'price' => 'float',
        'total' => 'float',
        'description' => 'string',
        'qoutation_id' => 'integer'
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
    public function inventoryItem()
    {
        return $this->belongsTo(\App\Models\Sales\InventoryItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function salesQoutation()
    {
        return $this->belongsTo(\App\Models\Sales\SalesQoutation::class);
    }
}
