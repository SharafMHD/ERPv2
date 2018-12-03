<?php

namespace App\Models\Inventory;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class units
 * @package App\Models\Inventory
 * @version December 2, 2018, 3:09 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accountingTransactions
 * @property \Illuminate\Database\Eloquent\Collection attendances
 * @property \Illuminate\Database\Eloquent\Collection bonuses
 * @property \Illuminate\Database\Eloquent\Collection certifications
 * @property \Illuminate\Database\Eloquent\Collection coursesDetails
 * @property \Illuminate\Database\Eloquent\Collection employeeLeaves
 * @property \Illuminate\Database\Eloquent\Collection Item
 * @property \Illuminate\Database\Eloquent\Collection movementDetails
 * @property \Illuminate\Database\Eloquent\Collection orderDetails
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection payrolls
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectOrders
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedulars
 * @property \Illuminate\Database\Eloquent\Collection purchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection qoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salaryProfiles
 * @property \Illuminate\Database\Eloquent\Collection salesDetails
 * @property \Illuminate\Database\Eloquent\Collection stockDetails
 * @property \Illuminate\Database\Eloquent\Collection trainingMembers
 * @property \Illuminate\Database\Eloquent\Collection workGroupMembers
 * @property string name
 * @property string description
 */
class units extends Model
{
    use SoftDeletes;

    public $table = 'inventory__units';
    
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
    public function items()
    {
        return $this->hasMany(\App\Models\Inventory\Item::class);
    }
}
