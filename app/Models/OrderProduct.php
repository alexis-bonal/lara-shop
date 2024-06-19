<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Relations\Pivot;

    class OrderProduct extends Pivot
    {
        protected $fillable = [
            'order_id',
            'product_id',
            'quantity',
            'price'
        ];
    }

?>
