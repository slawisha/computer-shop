<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    //use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'manufacturer_id', 'model', 'category_id', 'price',
        'processor', 'memory', 'hdd', 'graphics', 'screen', 'optical',
        'gallery_id', 'number'
    ];
    /**
     * Product belongs to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
	}

    /**
     * Product has a manufacturer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }


    /**
     * Product can have many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }


}
