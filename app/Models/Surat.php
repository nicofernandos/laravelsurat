<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';
    protected $primaryKey = 'idsurat';

    protected $fillable = [
        'idkategori',
        'nosurat',
        'dari',
        'tujuan',
        'judulsurat',
        'tanggal',
        'deskripsisurat',
        'file',
        'namattd',
        'fotottd',
        'qrcode',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori', 'id');
    }
}