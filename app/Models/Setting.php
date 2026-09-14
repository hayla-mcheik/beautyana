<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='settings';
protected $fillable = [
    'website_name',
    'website_url',
    'logo',

    'breadcrumb_about',
    'breadcrumb_contact',
    'breadcrumb_categories',
    'breadcrumb_collections',
    'breadcrumb_accessories',
    'breadcrumb_onsale',

    'address',
    'phone1',
    'phone2',
    'email1',
    'email2',
    'facebook_pixel_id',
    'facebook',
    'instagram',
    'twitter',
    'youtube',
];
}
