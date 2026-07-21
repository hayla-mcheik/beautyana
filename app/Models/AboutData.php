<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutData extends Model
{
    protected $table = 'about_data';
    
    // Fixed the quotes around 'icontwo' and 'iconthree'
    protected $fillable = [
        'title',
        'description',
        'imgone',
        'imgtwo',
        'imgthree',
        'years',
        'iconone',
        'icontwo',
        'iconthree',
        'titleone',
        'titletwo',
        'titlethree'
    ];
}