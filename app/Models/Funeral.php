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
        return $this->belongsToMany(User::class, 'funeral_user', 'funeral_id', 'user_id');
    }

    public function getStatus()
    {
        $now = Carbon::now();
        $start = Carbon::parse($this->date);
        $end = $this->getEndDate();

        if ($now->isAfter($end)) {
            return 'done';
        } else if ($now->isBefore($start)) {
            return 'prepared';
        } else {
            return 'in progress';
        }
    }

    public function getEndDate($date = null)
    {
        if ($date == null) {
            $end = Carbon::parse($this->date);
        } else {
            $end = Carbon::parse($date);
        }
        $time = Carbon::createFromFormat('H:i:s', $this->offer->duration);
        $end->addHours($time->format('H'));
        $end->addMinutes($time->format('i'));
        $end->addSeconds($time->format('s'));
        return $end;
    }

    public function isOverlaping($start1, $end1)
    {
        $start1 = Carbon::parse($start1);
        $end1 = Carbon::parse($end1);
        $start2 = Carbon::parse($this->date);
        $end2 = $this->getEndDate();

        return ($start1->lessThanOrEqualTo($end2)) && ($end1->greaterThanOrEqualTo($start2));
    }
}
