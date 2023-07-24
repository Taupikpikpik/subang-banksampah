<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenarikanSaldo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'penarikan_saldo';

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
    protected $fillable = ['id_saldo', 'id_nasabah','jumlah', 'kode', 'status', 'ket'];

    public function nasabah()
    {
            return $this->hasOne(\App\User::class, 'id', 'id_nasabah');
    }

}
