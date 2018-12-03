<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class categories
 * @package App\Models\Inventory
 * @version December 3, 2018, 10:09 am UTC
 *
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
 * @property \Illuminate\Database\Eloquent\Collection InventoryItem
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
 * @property string name
 * @property string description
 */
class categories extends Model
{
    use SoftDeletes;

    public $table = 'inventory__categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inventoryItems()
    {
        return $this->hasMany(\App\Models\Inventory\InventoryItem::class);
    }
}
