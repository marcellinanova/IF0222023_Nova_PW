<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
    use HasFactory;
    protected $table = 'program_studis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_prodi',
        'nama_prodi',
        'fakultas_id',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

}
