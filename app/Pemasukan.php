<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';

    protected $fillable = ['users_id', 'nama_pemasukan', 'kategori', 'tanggal_pemasukan', 'jumlah_pemasukan'];
}
