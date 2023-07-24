<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembelianSampah extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pembelian_sampahs';

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
    protected $fillable = ['id_pengepul', 'status_pembelian', 'kode_pembelian', 'ket'];

    public function detail()
    {
            return $this->hasMany(PembelianSampahDetail::class, 'id_pembelian_sampah', 'id');
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
