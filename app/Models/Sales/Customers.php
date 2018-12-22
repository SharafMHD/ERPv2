<?php

namespace App\Models\Sales;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customers
 * @package App\Models\Sales
 * @version December 22, 2018, 2:53 pm UTC
 *
 * @property string no
 * @property string name
 * @property string type
 * @property string phone
 * @property string email
 */
class Customers extends Model
{
    use SoftDeletes;

    public $table = 'sales__customers';
    

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    public $fillable = [
        'no',
        'name',
        'type',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'no' => 'string',
        'name' => 'string',
        'type' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no' => 'required',
        'name' => 'required',
        'type' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];

    
}
