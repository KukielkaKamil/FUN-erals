<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Funeral extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['date', 'cost', 'accepted'];
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_funerals', 'funeral_id', 'user_id');
    }

    public function getStatus()
    {
        $now = Carbon::now();
        $start = Carbon::parse($this->date);
        $end = Carbon::parse($this->date);
        $time = Carbon::createFromFormat('H:i:s', $this->offer->duration);
        $end->addHours($time->format('H'));
        $end->addMinutes($time->format('i'));
        $end->addSeconds($time->format('s'));

        if ($now->greaterThan($end)) {
            return 'done';
        } else if ($now->lessThan($start)) {
            return 'prepared';
        } else {
            return 'in progress';
        }
    }
}
