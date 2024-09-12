<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;


class BorrowController extends Controller
{

    public function store(Request $request, $book_id)
    {   
        $user_id = Auth::id();

        $request->validate([
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
        ]);

        $borrow = Borrow::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
        ]);

        return redirect('/book/'.$book_id);
  
    }

}
