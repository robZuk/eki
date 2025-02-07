<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class User extends Authenticatable implements LdapAuthenticatable
{
    use HasFactory, Notifiable, AuthenticatesWithLdap, HasLdapUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'objectGUID',
        'domain',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        if ($this->roles->pluck('id')->contains($role)) {
            return true;
        }
        return false;
    }

    /**
     * Set the LDAP domain for the user.
     *
     * @param string|null $value
     * @return void
     */
    public function setLdapDomain($value)
    {
        $this->domain = $value;
    }

    /**
     * Get the column name of the LDAP domain.
     *
     * @return string|null
     */
    public function getLdapDomainColumn()
    {
        return 'domain';
    }

    /**
     * Get the column name of the LDAP GUID.
     *
     * @return string|null
     */
    public function getLdapGuidColumn()
    {
        return 'objectGUID';
    }
}
