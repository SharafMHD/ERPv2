<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class items
 * @package App\Models\Inventory
 * @version December 3, 2018, 10:40 am UTC
 *
 * @property \App\Models\Inventory\InventoryCategory inventoryCategory
 * @property \App\Models\Inventory\InventoryUnit inventoryUnit
 * @property \Illuminate\Database\Eloquent\Collection accountingTransactions
 * @property \Illuminate\Database\Eloquent\Collection hrAttendances
 * @property \Illuminate\Database\Eloquent\Collection hrBonuses
 * @property \Illuminate\Database\Eloquent\Collection hrCertifications
 * @property \Illuminate\Database\Eloquent\Collection hrCoursesDetails
 * @property \Illuminate\Database\Eloquent\Collection hrEmployeeLeaves
 * @property \Illuminate\Database\Eloquent\Collection hrPayrolls
 * @property \Illuminate\Database\Eloquent\Collection hrSalaryProfiles
 * @property \Illuminate\Database\Eloquent\Collection hrTrainingMembers
 * @property \Illuminate\Database\Eloquent\Collection InventoryDetail
 * @property \Illuminate\Database\Eloquent\Collection InventoryMovementDetail
 * @property \Illuminate\Database\Eloquent\Collection InventoryOrderDetail
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrders
 * @property \Illuminate\Database\Eloquent\Collection InventoryTransaction
 * @property \Illuminate\Database\Eloquent\Collection ProjectOrderDetail
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection projectWorkGroupMembers
 * @property \Illuminate\Database\Eloquent\Collection PurchasePurchaseDetail
 * @property \Illuminate\Database\Eloquent\Collection SalesQoutationDetail
 * @property \Illuminate\Database\Eloquent\Collection SalesSalesDetail
 * @property string no
 * @property string name
 * @property integer category_id
 * @property integer unit_id
 * @property float sales_price
 * @property float purchase_price
 * @property float low_stock_qty
 * @property string color
 * @property string size
 * @property string description
 * @property string item_type
 */
class items extends Model
{
    use SoftDeletes;

    public $table = 'inventory__items';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'no',
        'name',
        'category_id',
        'unit_id',
        'sales_price',
        'purchase_price',
        'low_stock_qty',
        'color',
        'size',
        'description',
        'item_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no' => 'string',
        'name' => 'string',
        'category_id' => 'integer',
        'unit_id' => 'integer',
        'sales_price' => 'float',
        'purchase_price' => 'float',
        'low_stock_qty' => 'float',
        'color' => 'string',
        'size' => 'string',
        'description' => 'string',
        'item_type' => 'string'
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
    public function categories()
    {
        return $this->belongsTo(\App\Models\Inventory\categories::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function units()
    {
        return $this->belongsTo(\App\Models\Inventory\units::class, 'unit_id', 'id');
    }
    // public function unit()
    // {
    //     return $this->belongsTo(\App\Models\unit::class, 'unit_id', 'id');
    // }
    // // public function unit()
    // // {
    // //     return $this->belongsTo(\App\Models\Inventory\unit::class);
    // // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inventoryDetails()
    {
        return $this->hasMany(\App\Models\Inventory\StockDetails::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function MovementDetails()
    {
        return $this->hasMany(\App\Models\Inventory\movementDetails::class,'item_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inventoryOrderDetails()
    {
        return $this->hasMany(\App\Models\Inventory\InventoryOrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Transactions()
    {
        return $this->hasMany(\App\Models\Inventory\InventoryTransactions::class, 'item_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projectOrderDetails()
    {
        return $this->hasMany(\App\Models\Inventory\ProjectOrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function purchasePurchaseDetails()
    {
        return $this->hasMany(\App\Models\Inventory\PurchasePurchaseDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salesQoutationDetails()
    {
        return $this->hasMany(\App\Models\Inventory\SalesQoutationDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function salesSalesDetails()
    {
        return $this->hasMany(\App\Models\Inventory\SalesSalesDetail::class);
    }
}
