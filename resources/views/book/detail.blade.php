@extends('layouts.blank')

@section('judul')
   Book Detail
@endsection

@section('content')

<img src="{{ asset ('uploads/'. $book->image) }}" class="img-fluid" alt="...">
<h1 class="text-primary">{{ $book->title }}</h1>
<p>{{ $book->summary }}</p>
<br>
<a href="/"></a>
<hr>

<h4 class="text-info" style="text-align:center">-- Borrow List --</h4>
<br>
@forelse ($book->borrowedList as $item)
<div class="card mt-3">
   <div class="card-header">
     This Book are Borrowed By {{ $item->borrowBy->name }}
   </div>
   <div class="card-body">
     <p class="card-text">On : {{ $item->tanggal_peminjaman }}</p>>
     <p class="card-text">Until : {{ $item->tanggal_pengembalian }}</p>>
   </div>
 </div>
@empty
    <h4>there are no borrowers on this book</h4>
@endforelse
<hr>

@auth
<form method="POST" action="/borrow/{{$book->id}}">
   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>s
           @endforeach
       </ul>
   </div>
   @endif
   @csrf
   <h2 class="text-primary mb-5" style="text-align: center">Borrow Form</h2>
   <div class="form-group">
      <label>Tanggal Peminjaman</label>
      <input type="date" name="tanggal_peminjaman" class="form-control">
   </div>
   <div class="form-group">
      <label>Tanggal Pengembalian</label>
      <input type="date" name="tanggal_pengembalian" class="form-control">
   </div>
   <button type="submit" class="btn btn-primary  btn-sm btn-block">Submit</button>
</form>
@endauth

@endsection