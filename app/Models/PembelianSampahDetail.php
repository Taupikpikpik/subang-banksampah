<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianSampahDetail extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pembelian_sampah_details';

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
    protected $fillable = ['id_sampah', 'kuantitas', 'total', 'id_pembelian_sampah'];

    public function pembelian_sampah()
    {
            return $this->belongsTo(PembelianSampah::class, 'id_pembelian_sampah', 'id');
    }

    public function sampah()
    {
            return $this->hasOne(BankSampah::class, 'id', 'id_sampah');
    }

    public function pengepul()
    {
            return $this->hasOne(\App\User::class, 'id', 'id_pengepul');
    }

}
