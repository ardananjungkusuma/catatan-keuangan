<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    protected $table = 'hutang';

    protected $fillable = ['users_id', 'nama_penghutang', 'nominal_hutang', 'tanggal_hutang'];
}
