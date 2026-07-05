<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table='blogs';
    protected $fillable=['title','by','date','description','image'];
public function images()
{
    return $this->hasMany(BlogImage::class, 'blog_id', 'id');
}
}
