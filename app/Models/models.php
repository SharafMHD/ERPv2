<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class models
 * @package App\Models
 * @version October 23, 2018, 2:07 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection accountsTransaction
 * @property \Illuminate\Database\Eloquent\Collection Action
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
 * @property \Illuminate\Database\Eloquent\Collection workGroupMember
 * @property string name
 * @property string label
 * @property integer parent
 * @property string icon
 */
class models extends Model
{
    use SoftDeletes;

    public $table = 'models';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'label',
        'parent',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'label' => 'string',
        'parent' => 'integer',
        'icon' => 'string'
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
    public function actions()
    {
        return $this->hasMany(\App\Models\actions::class,'model');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function privileges()
    {
        return $this->hasMany(\App\Models\Privilege::class);
    }
}
