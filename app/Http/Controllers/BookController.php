<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $books = Book::all();

        return view('book.show', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('book.tambah', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',	
            'category_id' => 'required|integer'
        ]);

        $imageName = time().'.'.$request->image->extension();  
        
        $request->image->move(public_path('uploads'), $imageName);

        $book = new Book;
 
        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->image = $imageName;
        $book->category_id = $request->input('category_id');
 
        $book->save();
 
        return redirect('/book');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        return view('book.detail', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Book::find($id);

        return view ('book.edit', ['categories' => $categories, 'book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',	
            'category_id' => 'required|integer'
        ]);

        $book = Book::find($id);

        if($request->has('image')){

            if($book->image){
                File::delete('uploads/'.$book->image);
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);

            $book->image = $imageName;
        }

        $book->title = $request->input('title');
        $book->summary = $request->input('summary');
        $book->category_id = $request->input('category_id');

        $book->save();

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if($book->image){
            File::delete('uploads/'.$book->image);
        }

        $book->delete();

        return redirect('/book');

    }
}
