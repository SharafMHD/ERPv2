<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InventoryTransactions
 * @package App\Models\Inventory
 * @version December 4, 2018, 2:05 pm UTC
 *
 * @property \App\Models\Inventory\InventoryWarehouse inventoryWarehouse
 * @property \App\Models\Inventory\InventoryItem inventoryItem
 * @property \App\Models\Inventory\User user
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
 * @property \Illuminate\Database\Eloquent\Collection salesQoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property date date
 * @property string no
 * @property integer warehouse_id
 * @property integer item_id
 * @property integer transaction_type
 * @property float qty
 * @property float price
 * @property string description
 * @property integer user_id
 */
class InventoryTransactions extends Model
{
    use SoftDeletes;

    public $table = 'inventory__transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'no',
        'warehouse_id',
        'item_id',
        'transaction_type',
        'qty',
        'description',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no' => 'string',
        'warehouse_id' => 'integer',
        'item_id' => 'integer',
        'transaction_type' => 'string',
        'qty' => 'float',
        'description' => 'string',
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
    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Inventory\warehouses::class,  'warehouse_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function items()
    {
        return $this->belongsTo(\App\Models\Inventory\items::class, 'item_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\users::class);
    }
}
