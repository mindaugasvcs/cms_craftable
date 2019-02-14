<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    
    protected $fillable = [
        "brand_id",
        "sku",
        "name",
        "msrp",
        "price",
        "wholesale_price",
        "discount_available",
        "discount",
        "enabled",
        "available_date",
        "units_in_stock",
        "units_on_order",
        "minimal_quantity",
        "width",
        "height",
        "depth",
        "weight",
        "description",
        "images",
        "note",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "available_date",
        "created_at",
        "updated_at",
        "deleted_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/products/'.$this->getKey());
    }

    
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
