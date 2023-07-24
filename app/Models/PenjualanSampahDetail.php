<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualanSampahDetail extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penjualan_sampah_details';

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
    protected $fillable = ['id_sampah', 'kuantitas', 'total', 'id_penjualan_sampah'];

    public function sampah()
    {
            return $this->hasOne(BankSampah::class, 'id', 'id_sampah');
    }

    public function penjualan_sampah()
    {
            return $this->belongsTo(PenjualanSampah::class, 'id_penjualan_sampah', 'id');
    }

    public function nasabah()
    {
            return $this->hasOne(\App\User::class, 'id', 'id_nasabah');
    }

    public function dataNasabah(){
        return DB::table('penjualan_sampahs')->select('penjualan_sampahs.id', 'users.name')->join('users', 'users.id', '=', 'penjualan_sampahs.id_nasabah', 'left')->distinct()->where('penjualan_sampahs.status_penjualan', 'Menunggu Konfirmasi Admin')->get();
    }

}
