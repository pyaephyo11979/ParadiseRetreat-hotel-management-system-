<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $role = null;
    /**
     * Get the role of the user.
     *
     * @return string|null
     */
    /**
     * Define the relationship to the Role model.
     */
    public function roleRelation()
    {
        return $this->hasOne(Role::class,'role_id');
    }

    /**
     * Get the role name of the user.
     *
     * @return string|null
     */
    public function role(): ?string
    {
        return $this->roleRelation ? $this->roleRelation->name : null;
    }
}
