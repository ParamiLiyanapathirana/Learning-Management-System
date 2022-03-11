<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';//2022_03_07_111919_create_categories_table name categories
    protected $fillable=
    [
        'name',//all the feilds in 2022_03_07_111919_create_categories_table name categories table
        'description'
    ];
}
