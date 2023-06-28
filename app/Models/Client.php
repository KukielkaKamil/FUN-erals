<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'pesel', 'phone_number', 'email'];
    public function funeral(): HasMany
    {
        return $this->hasMany(Funeral::class);
    }
    public function promoCode(): HasMany
    {
        return $this->hasMany(PromoCode::class);
    }
}
