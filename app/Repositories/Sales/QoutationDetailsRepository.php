<?php

namespace App\Repositories\Sales;

use App\Models\Sales\QoutationDetails;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QoutationDetailsRepository
 * @package App\Repositories\Sales
 * @version December 30, 2018, 5:11 pm UTC
 *
 * @method QoutationDetails findWithoutFail($id, $columns = ['*'])
 * @method QoutationDetails find($id, $columns = ['*'])
 * @method QoutationDetails first($columns = ['*'])
*/
class QoutationDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'qty',
        'price',
        'total',
        'description',
        'qoutation_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return QoutationDetails::class;
    }
}
