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

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'stock',
        'price'
    ];

    /**
     * Returns the product category.
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    #[SearchUsingPrefix(['id', 'description', 'name', 'stock', 'image'])]
    public function toSearchableArray(): array
    {
        // Customize the data array...
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "stock" => $this->stock,
            "image" => $this->image,
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
}
