<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use Carbon\Carbon;

class User extends AuthenticatableForUser implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'nickname', 'email', 'password', 'first_name', 'last_name', 'avatar',
        'gender', 'birthday', 'comments_count'
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'avatar' => 'array',
        'gender' => 'boolean',
        // 'birthday' => 'date:Y-m-d'
    ];

    /**
     * The attributes that should be mutated to dates.
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'birthday'
    ];

    /**
     * Какие Accessors при сериализации должны быть выданы
     */
    protected $appends = ['fullName'];

    /**
     * Accessor для полного имени
     */
    function getFullNameAttribute() {
        return $this->first_name && $this->last_name ? "$this->first_name  $this->last_name" : null;
    }

    /**
     * Accessor для возраста.
     */
    public function getAgeAttribute()
    {
        if (!$this->birthday) {
            return null;
        }
        return Carbon::parse($this->birthday)->age;
    }

    /**
     * Accessor для hasVerifiedEmail.
     */
    public function getHasVerifiedEmailAttribute() {
        return true;
    }

    /**
     * By nickname
     *
     * @param $query
     * @param $name
     * @return Builder
     */
    public function scopeOfNickname($query, $name)
    {
        return $query->where('nickname', $name);
    }

    /**
     * By email
     *
     * @param $query
     * @param $email
     * @return Builder
     */
    public function scopeOfEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}
