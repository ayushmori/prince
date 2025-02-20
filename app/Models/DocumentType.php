<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentType extends Model
{
    use HasFactory;

    protected $table = 'document_types';
    protected $fillable = [
        'name',
        'image',
        'description',
        'serial_number',
    ];

}