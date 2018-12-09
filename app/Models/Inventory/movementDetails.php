<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class movementDetails
 * @package App\Models\Inventory
 * @version December 4, 2018, 2:20 pm UTC
 *
 * @property \App\Models\Inventory\InventoryItem inventoryItem
 * @property \App\Models\Inventory\InventoryMovement inventoryMovement
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
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection inventoryOrders
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection projectWorkGroupMembers
 * @property \Illuminate\Database\Eloquent\Collection purchasePurchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection salesQoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salesSalesDetails
 * @property integer item_id
 * @property float qty
 * @property string notes
 * @property integer movement_id
 */
class movementDetails extends Model
{
    use SoftDeletes;

    public $table = 'inventory__movement_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'item_id',
        'qty',
        'notes',
        'movement_id'
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
        'notes' => 'string',
        'movement_id' => 'integer'
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
    public function items()
    {
        return $this->belongsTo(\App\Models\Inventory\items::class,'item_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function inventoryMovement()
    {
        return $this->belongsTo(\App\Models\Inventory\transfer::class, 'movement_id','id');
    }
}
