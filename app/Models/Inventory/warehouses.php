<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class warehouses
 * @package App\Models\Inventory
 * @version November 29, 2018, 5:11 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accountsTransactions
 * @property \Illuminate\Database\Eloquent\Collection attendances
 * @property \Illuminate\Database\Eloquent\Collection bonuses
 * @property \Illuminate\Database\Eloquent\Collection certifications
 * @property \Illuminate\Database\Eloquent\Collection coursesDetails
 * @property \Illuminate\Database\Eloquent\Collection employeeLeaves
 * @property \Illuminate\Database\Eloquent\Collection items
 * @property \Illuminate\Database\Eloquent\Collection movementDetails
 * @property \Illuminate\Database\Eloquent\Collection Movement
 * @property \Illuminate\Database\Eloquent\Collection Movement
 * @property \Illuminate\Database\Eloquent\Collection orderDetails
 * @property \Illuminate\Database\Eloquent\Collection Order
 * @property \Illuminate\Database\Eloquent\Collection payrolls
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection purchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection Purchase
 * @property \Illuminate\Database\Eloquent\Collection qoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salaryProfiles
 * @property \Illuminate\Database\Eloquent\Collection Sale
 * @property \Illuminate\Database\Eloquent\Collection salesDetails
 * @property \Illuminate\Database\Eloquent\Collection StockDetail
 * @property \Illuminate\Database\Eloquent\Collection StockTransaction
 * @property \Illuminate\Database\Eloquent\Collection trainingMembers
 * @property \Illuminate\Database\Eloquent\Collection workGroupMembers
 * @property string name
 * @property string keeper
 * @property string location
 * @property string phone
 * @property string status
 */
class warehouses extends Model
{
    use SoftDeletes;

    public $table = 'inventory__warehouses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'name',
        'keeper',
        'location',
        'phone',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'keeper' => 'string',
        'location' => 'string',
        'phone' => 'string',
        'status' => 'string'
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
    public function movements()
    {
        return $this->hasMany(\App\Models\Inventory\Movement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    // public function movements()
    // {
    //     return $this->hasMany(\App\Models\Inventory\Movement::class);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Inventory\Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function purchases()
    {
        return $this->hasMany(\App\Models\Inventory\Purchase::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sales()
    {
        return $this->hasMany(\App\Models\Inventory\Sale::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stockDetails()
    {
        return $this->hasMany(\App\Models\Inventory\StockDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stockTransactions()
    {
        return $this->hasMany(\App\Models\Inventory\StockTransaction::class);
    }
}
