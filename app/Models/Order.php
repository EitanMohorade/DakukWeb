<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'comments',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
    #[SearchUsingPrefix(['id', 'user_id', 'status','comments'])]
    public function toSearchableArray(): array
    {
        // Customize the data array...
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "status" => $this->status,
            "comments" => $this->comments,
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
        $query = self::search($search, function ($query) {
            $query->where('id', '!=', auth()->id());
        });

        return ($status == 'deleted') ? $query->onlyTrashed() : $query;
    }
}
