<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\FormatCreatedAt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FormatCreatedAt;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'email',
        'last_name',
        'contact',
        'avatar',
        'is_admin',
        'password',
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

    protected $appends = [
        'avatar',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeProvider($query)
    {
        return $query->where('is_admin', false);
    }

    public function services()
    {
        return $this->hasMany(Course::class);
    }

    public function avatar(): Attribute
    {
        return new Attribute(
            get: fn () => $this->profil_photo_path ? asset('storage/'.$this->profil_photo_path) : "https://ui-avatars.com/api/?name={$this->full_name}&background=0D8ABC&color=fff&size=80"
        );
    }
}
