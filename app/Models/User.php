<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'phone_number',
        'salary'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function funeral(): BelongsToMany{
        return $this->belongsToMany(Funeral::class,'funeral_user', 'user_id','funeral_id');
    }

    public function isOccupied(Funeral $f,$sdate = null){
        $sdate = $sdate ?? $f->date;
        $edate = $f->getEndDate($sdate);
        $id= $f->id;
        $funerals = $this->funeral;
        $occupied = false;
        foreach($funerals as $funeral){
            if($funeral->id == $id) continue;
            if ($funeral->isOverlaping($sdate,$edate)){
                $occupied = true;
                break;
            }
        }
        return $occupied;
     }
}
