@extends('layouts.blank')

@section('judul')
   Edit Category
@endsection

@section('content')
    <form method="POST" action="/category/{{ $categories->id }}">
        @method("PUT")
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
            <label>Nama Category</label>
            <input type="name" name="name" class="form-control" value="{{ $categories->name }}">
            <br>    
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection