<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    protected $fillable = ['users_id', 'nama_pengeluaran', 'kategori', 'tanggal_pengeluaran', 'jumlah_pengeluaran'];
}
