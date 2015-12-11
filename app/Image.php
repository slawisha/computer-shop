<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $fillable = ['product_id', 'url', 'thumb_url',  'order'];
    /**
     * a product can have many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
	}
}
