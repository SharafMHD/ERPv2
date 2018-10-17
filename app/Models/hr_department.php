<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class hr_department
 * @package App\Models
 * @version October 17, 2018, 2:54 pm UTC
 *
 * @property string name
 * @property string description
 */
class hr_department extends Model
{
    use SoftDeletes;

    public $table = 'hr_department';
    

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
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
