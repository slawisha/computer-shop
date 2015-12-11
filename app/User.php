<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, BillableContract  {

	use Authenticatable, CanResetPassword, Billable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * User has a role
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function role()
	{
		return $this->belongsTo('App\Role');
	}

	/**
	 * User can place many orders
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function orders()
	{
		return $this->hasMany(Order::class);
	}

}
