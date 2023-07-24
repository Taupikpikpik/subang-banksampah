<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bank_sampahs';

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
    protected $fillable = ['nama_sampah', 'id_kategori_sampah', 'stok', 'harga_beli', 'harga_jual','status_sampah'];

    
    public function kategori()
    {
            return $this->hasOne(KategoriSampah::class, 'id', 'id_kategori_sampah');
    }
}
