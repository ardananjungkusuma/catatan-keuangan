<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = ['users_id', 'nama_wishlist', 'tanggal_wishlist', 'image_wishlist', 'status_wishlist'];

    public function getImage()
    {
        return asset('img/wishlist/' . $this->image_wishlist);
    }
}
