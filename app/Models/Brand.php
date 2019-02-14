<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
    
    protected $fillable = [
        "name",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/brands/'.$this->getKey());
    }

    
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
