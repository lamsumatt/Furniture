<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product_details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_id', 'summary', 'activated','images', 'prDetails_name', 'slug_prDetails'
    ];
    protected $primaryKey = 'id';
    protected $table = 'product_details';

    public function Product(){
        return $this->belongsTo('App\Models\Admin\Product_Admin',  'id');
    }
}
