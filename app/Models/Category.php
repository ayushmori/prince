<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Specify the table name (optional, if the table name is 'categories', this can be omitted)
    protected $table = 'categories';

    // Define the fillable attributes to protect against mass assignment
    protected $fillable = [
        'name',
        'image',
        'description',
        'serial_number',
    ];
}
