<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
        'model',
        'noplat',
        'tarif',
        'status',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function scopeSearch($query, $merek = null, $model = null, $status = null)
    {
        return $query
            ->when($merek, function ($query, $merek) {
                return $query->where('merek', 'LIKE', "%{$merek}%");
            })
            ->when($model, function ($query, $model) {
                return $query->where('model', 'LIKE', "%{$model}%");
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            });
    }
    protected $table = 'mobils';
}
