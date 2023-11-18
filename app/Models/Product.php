<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Notifiable, SoftDeletes;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'ms_products';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'price',
        'stock',
    ];

    /**
     * Get the relationship for the model.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
