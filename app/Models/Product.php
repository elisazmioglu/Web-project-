<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Allow these fields to accept data from the form
    protected $fillable = ['name', 'description', 'price', 'stock'];
}
