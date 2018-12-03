<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class transfer
 * @package App\Models\Inventory
 * @version December 3, 2018, 1:03 pm UTC
 *
 * @property \App\Models\Inventory\InventoryWarehouse inventoryWarehouse
 * @property \App\Models\Inventory\InventoryWarehouse inventoryWarehouse
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
 * @property \Illuminate\Database\Eloquent\Collection InventoryMovementDetail
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrders
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection projectWorkGroupMembers
 * @property \Illuminate\Database\Eloquent\Collection purchasePurchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection salesQoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property string no
 * @property date date
 * @property integer from_warehouse_id
 * @property integer to_warehouse_id
 * @property string notes
 * @property string status
 * @property integer user_id
 */
class transfer extends Model
{
    use SoftDeletes;

    public $table = 'inventory__movements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'no',
        'date',
        'from_warehouse_id',
        'to_warehouse_id',
        'notes',
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
        'no' => 'string',
        'date' => 'date',
        'from_warehouse_id' => 'integer',
        'to_warehouse_id' => 'integer',
        'notes' => 'string',
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
    public function Warehouse()
    {
        return $this->belongsTo(\App\Models\Inventory\Warehouse::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\user::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function MovementDetails()
    {
        return $this->hasMany(\App\Models\Inventory\InventoryMovementDetail::class);
    }
}
