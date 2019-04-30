<?php

namespace App;

use App\Contracts\MustVerifyPhone;
use App\Models\Order;
use App\Models\Role;
use App\Models\Store;
use App\Models\StoreBranchCashier;
use App\Notifications\VerifyEmailNotification;
use App\Notifications\VerifyPhoneNotification;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, MustVerifyPhone
{
    use Notifiable, VerifiesEmails;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id', 'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Route notifications for the AfricasTknSms channel.
     *
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @return string
     */
    public function routeNotificationForAfricasTknSms($notification)
    {
        return $this->phone;
    }

    /**
     * A user can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    /**
     * Checks if User has access to $permissions.
     *
     * @param array $permissions
     *
     * @return bool
     */
    public function hasAccess(array $permissions): bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if ($role->hasAccess($permissions)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the user belongs to role.
     *
     * @param string $roleSlug
     *
     * @return bool
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function stores()
    {
        return $this->hasMany(Store::class,'user_id');
    }

    public function cashier()
    {
        return $this->hasOne(StoreBranchCashier::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendPhoneVerificationNotification()
    {
        $this->notify(new VerifyPhoneNotification());
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
}
