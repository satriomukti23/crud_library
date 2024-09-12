@extends('layouts.blank')

@section('judul')
   Library Page
@endsection

@section('content')

    <h2 style="text-align: center">Book & Borrows System</h2>
    <ul>
        <li style="font-size: 20px">Books</li>
        <li style="font-size: 20px">Category</li>
        <li style="font-size: 20px">Borrows</li>
    </ul>
    <br>
    
    <ul>
        @auth
        <li><a href="/book">Book Page</a></li>
        <li><a href="/category">Category Page</a></li>
        @endauth
    </ul>
@endsection