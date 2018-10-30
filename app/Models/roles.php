<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class roles
 * @package App\Models
 * @version October 23, 2018, 2:20 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accountsTransaction
 * @property \Illuminate\Database\Eloquent\Collection attendance
 * @property \Illuminate\Database\Eloquent\Collection bonuses
 * @property \Illuminate\Database\Eloquent\Collection certifications
 * @property \Illuminate\Database\Eloquent\Collection coursesDetails
 * @property \Illuminate\Database\Eloquent\Collection employeeLeave
 * @property \Illuminate\Database\Eloquent\Collection items
 * @property \Illuminate\Database\Eloquent\Collection movementDetails
 * @property \Illuminate\Database\Eloquent\Collection orderDetails
 * @property \Illuminate\Database\Eloquent\Collection orders
 * @property \Illuminate\Database\Eloquent\Collection payroll
 * @property \Illuminate\Database\Eloquent\Collection Privilege
 * @property \Illuminate\Database\Eloquent\Collection projectOrder
 * @property \Illuminate\Database\Eloquent\Collection projectOrderDetails
 * @property \Illuminate\Database\Eloquent\Collection projectVisitSchedular
 * @property \Illuminate\Database\Eloquent\Collection purchaseDetails
 * @property \Illuminate\Database\Eloquent\Collection qoutationDetails
 * @property \Illuminate\Database\Eloquent\Collection salaryProfile
 * @property \Illuminate\Database\Eloquent\Collection salesDetails
 * @property \Illuminate\Database\Eloquent\Collection stockDetails
 * @property \Illuminate\Database\Eloquent\Collection trainingMembers
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property \Illuminate\Database\Eloquent\Collection workGroupMember
 * @property string role_name
 * @property integer created_by
 */
class roles extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'role_name',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'role_name' => 'string',
        'created_by' => 'integer'
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
    public function privileges()
    {
        return $this->hasMany(\App\Models\Privilege::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
