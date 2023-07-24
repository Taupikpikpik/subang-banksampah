<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPengambilan extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jadwal_pengambilan';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_penjualan', 'id_petugas', 'tanggal', 'status'];

    public function petugas()
    {
            return $this->hasOne(\App\User::class, 'id', 'id_petugas');
    }

    public function penjualan()
    {
            return $this->belongsTo(PenjualanSampah::class, 'id_penjualan', 'id');
    }
    

}
