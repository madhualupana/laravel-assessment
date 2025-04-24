<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getFullPathAttribute()
    {
        $path = [];
        $category = $this;

        while ($category) {
            array_unshift($path, $category->name);
            $category = $category->parent;
        }

        return implode(' > ', $path);
    }

    public static function getParentOptions($excludeId = null)
    {
        $categories = self::with('parent')->get();
        $options = [];

        foreach ($categories as $category) {
            if ($category->id !== $excludeId) {
                $options[$category->id] = $category->fullPath;
            }
        }

        return $options;
    }
}