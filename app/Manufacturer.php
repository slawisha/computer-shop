<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model {

    protected $fillable = ['name'];

    /**
     * Manufacturer can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
	}

}
