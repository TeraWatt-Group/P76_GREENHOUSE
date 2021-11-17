<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Session;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

	const TYPES = [
		'BASIC_TYPE' => 0,
		'ADMIN_TYPE' => 1,
		'MODER_TYPE' => 2,
		// 'DEALE_TYPE' => 3,
		// 'WHOLE_TYPE' => 4,
		// 'CONTR_TYPE' => 5,
		// 'DEFAU_TYPE' => 6,
		'BANNE_TYPE' => 10,
	];

	public $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username',
		'name',
		'surname',
		'email',
		'password',
		'status',
	];

	protected $appends = [
		'fullname',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'two_factor_recovery_codes',
		'two_factor_secret',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function isAdmin()
	{
		return (int)$this->status === self::TYPES['ADMIN_TYPE'];
	}

	public function isModerator()
	{
		return (int)$this->status === self::TYPES['MODER_TYPE'];
	}

	public function isBaned()
	{
		return (int)$this->status === self::TYPES['BANNE_TYPE'];
	}

	public function getFullnameAttribute()
	{
		return "{$this->name} {$this->surname}";
	}

	public function getInitialsAttribute()
	{
		return substr($this->username, 0, 2);
	}

	public function latest_login()
	{
		// return $this->hasOne(Session::class, 'user_id', 'id')->latestOfMany();
		return $this->hasOne(Session::class, 'user_id', 'id')->oldestOfMany();
	}
}
