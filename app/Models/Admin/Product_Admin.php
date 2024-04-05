<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'product_description', 'slug_product', 'activated',
    ];
    protected $primaryKey = 'id';
    protected $table = 'product_admin';

    public function Product_details(){
        return $this->hasMany(Product_details::class, 'prDetails_id', 'id');
    }
    
}
