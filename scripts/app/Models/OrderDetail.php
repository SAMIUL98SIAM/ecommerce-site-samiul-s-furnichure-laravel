<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->BelongsTo(Product::class,'product_id','id');
    }

    public function color()
    {
        return $this->BelongsTo(Color::class,'color_id','id');
    }

    public function size()
    {
        return $this->BelongsTo(Size::class,'size_id','id');
    }


}

