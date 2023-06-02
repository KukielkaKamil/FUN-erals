<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funeral extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','surname','pesel','phone_number','email'];
    public function client(): BelongsTo{
        return $this->belongsTo(Client::class);
    }
    public function offer(): BelongsTo{
        return $this->belongsTo(Offer::class);
    }
    public function user(): BelongsToMany{
        return $this->belongsToMany(User::class);
    }
}
