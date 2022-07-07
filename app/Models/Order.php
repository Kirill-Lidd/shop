<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 public function products()
  {
    return $this->hasManyThrough('App\Models\Product', 'App\Models\OrderProduct', 'product_id', 'id');
  }
}
