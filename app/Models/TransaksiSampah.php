<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TransaksiSampah extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transaksi_sampahs';

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
    protected $fillable = ['id_sampah', 'kuantitas', 'tanggal_transaksi', 'jenis_transaksi','id_jaulbeli'];

    public function sampah()
    {
            return $this->hasOne(BankSampah::class, 'id', 'id_sampah');
    }

    // public function detail():MorphTo
    // {
    //     if ($this->jenis_transaksi === 'Pembelian') {
    //         return $this->morphTo(PembelianSampahDetail::class, 'id', 'id_detail');
    //     } elseif ($this->jenis_transaksi === 'Penjualan') {
    //         return $this->morphTo(PenjualanSampahDetail::class, 'id', 'id_detail');
    //     } else {
    //         return null;
    //     }
    // }

}
