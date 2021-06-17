<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $table = 'donasi';
    protected $PrimaryKey = 'id';
    protected $fillable = ['nama_donasi', 'banner', 'tanggal', 'dokumentasi','keterangan','is_active','yayasan'];
}
