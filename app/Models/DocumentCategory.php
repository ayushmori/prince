<?php

namespace App\Models;

use App\Models\DocumentCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'serial_number',
        'name',
        'slug',
        'description',
        'parent_id',
        'image',
    ];
    
    public function children()
    {
        return $this->hasMany(DocumentCategory::class, 'parent_id')->with('children');
    }
    
    // Optionally, define the parent relationship (if needed)
    public function parent()
    {
        return $this->belongsTo(DocumentCategory::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(DocumentCategory::class, 'parent_id');
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    // In Category Model
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function shortAttributes()
    {
        return $this->hasMany(ShortAttribute::class);
    }
}
