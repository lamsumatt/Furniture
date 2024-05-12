<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name_blog', 'name_admin', 'summary_content', 'image', 'summary', 'day_update', 'activated'
    ];
    protected $primaryKey = 'id';
    protected $table = 'blog_admins';
}
