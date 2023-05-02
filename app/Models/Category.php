<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * The attributes that are searchable
     */
    #[SearchUsingPrefix(['id', 'category_id', 'name'])]
    public function toSearchableArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "category_id" => $this->category_id,
            "deleted_at" => $this->deleted_at,
        ];
    }

    public function getStatusColorAttribute()
    {
        return $this->deleted_at ? 'red' : 'green';
    }

    /**
     * Get the specified resource based on the selected status & search params
     * 
     * @param string $search
     * @param string $status
     */
    public static function getByStatus($search, $status)
    {
        $query = self::search($search);
        return ($status == 'deleted') ? $query->onlyTrashed() : $query;
    }

    public static function tree() {
        $categories = Category::get();

        $rootCategories = $categories->whereNull('category_id');

        self::formatTree($rootCategories, $categories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories) {
        foreach($categories as $category) {
            $category->children = $allCategories->where('category_id', $category->id)->values();

            if($category->children->isNotEmpty()) self::formatTree($category->children, $allCategories);
        }
    }
}
