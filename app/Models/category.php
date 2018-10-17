<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class category
 * @package App\Models
 * @version October 17, 2018, 1:35 pm UTC
 *
 * @property string name
 * @property string description
 */
class category extends Model
{
    use SoftDeletes;

    public $table = 'category';
    

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
