@extends('layouts.blank')

@section('judul')
   Show Book
@endsection

@section('content')

    <a href="/book/create" class="btn btn-sm btn-primary">Create Book</a>
    <br>
    <br>
    <div class="row">
        @forelse ($books as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset ('uploads/'. $item->image)}}" class="card-img-top" height="200px" alt="...">
                <div class="card-body">
                  <h2 style="font-weight: bold">{{ $item->title }}</h5>
                    <span class="badge badge-success mb-3" style="font-size: 15px">{{ $item->category->name }}</span>
                  <p class="card-text">{{ Str::limit($item->summary,100,$end=' ...') }}</p>
                  <a href="/book/{{ $item->id }}" class="btn btn-primary btn-block">Read More</a>
                    @auth
                    <div class="row mt-3">
                        <div class="col">
                            <a href="/book/{{ $item->id }}/edit" class="btn btn-warning btn-block">Edit</a>
                        </div>
                    @endauth
                    @auth
                        <div class="col">
                            <form action="/category/{{ $item->id }}" method="POST">
                                @csrf
                                @method("Delete")
                                <input type="submit" class="btn btn-danger btn-block" value="Delete">
                            </form>
                        </div>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h4>Book Empty</h4>
        @endforelse
        
    </div>

@endsection