@extends('layouts.blank')

@section('judul')
   Create Book
@endsection

@section('content')
    <form method="POST" action="/book" enctype="multipart/form-data">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="form-group">
            <label>Book Tittle</label>
            <input type="name" name="title" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label>Book Summary</label>
            <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label>image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">--Pilih Category--</option>
                @forelse ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="">--Belum ada category--</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection