<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'photo',
        'price',
        'location',
        'contact_link',
        'description',
        'category',
    ];

    public static function latestFiltered(array $filters, int $pagination)
    {
        return static::latest()->filter($filters)->paginate($pagination);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $query->where('category', 'like', '%'.request('tag').'%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%'.request('search').'%')
                ->orWhere('description', 'like', '%'.request('search').'%');
        }
    }
}
