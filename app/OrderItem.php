<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

	protected $table = 'order_items';

    protected $fillable = ['name', 'amount', 'order_id'];

    /**
     * Order item belongs to order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
