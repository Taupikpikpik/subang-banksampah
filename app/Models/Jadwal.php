<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jadwals';

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
    protected $fillable = ['id_petugas', 'hari', 'jam_start', 'jam_end', 'id_user', 'id_penjualan'];

    public function petugas()
    {
        return $this->hasOne(\App\User::class, 'id', 'id_petugas');
    }

    public function hari($dayNumber)
    {
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $index = ($dayNumber) % 7;
        return $days[$index];
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'id_user');
    }

    public function penjualan()
    {
        return $this->hasOne(\App\Models\PenjualanSampah::class, 'id', 'id_penjualan');
    }
}
