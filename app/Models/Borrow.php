<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];

    public $timestamps = false;

    public function borrowBy()
    {
        return $this->belongsTo(User::class, 'user_id');    
    }
}
