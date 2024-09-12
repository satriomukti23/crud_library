@extends('layouts.blank')

@section('judul')
   Detail Category
@endsection

@section('content')
    <a href="/category" class="btn btn-primary"> Back</a>
    <br>
    <br>
    <h1 class="text-primary">Category {{ $categories->name }}</h1>
    <br>
    <br>
    <div class="row">
        @forelse ($categories->bookList as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('uploads/' . $item->image) }}" class="card-img-top" height="200px" alt="...">
                    <div class="card-body">
                        <h2 style="font-weight: bold">{{ $item->title }}</h2>
                        <p class="card-text">{{ Str::limit($item->summary, 100, $end=' ...') }}</p>
                        <a href="/book/{{ $item->id }}" class="btn btn-primary btn-block">Read More</a>
                    </div>
                </div>
            </div>  
        @empty
            <h5>No Books Yet</h5>
        @endforelse
    </div>
@endsection

