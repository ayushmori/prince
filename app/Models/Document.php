<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'type', 'file_path'];
    // protected $casts = [
    //     'documents' => array()
    // ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
