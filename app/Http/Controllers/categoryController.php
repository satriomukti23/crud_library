<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['getall','showid']);
    }

    public function create()
    {
        return view('page.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        DB::table('categories')->insert([
            'name'=> $request->input('name')
        ]);

        return redirect('/category');
    }

    public function getall()
    {
        $categories = DB::table('categories')->get();

        return view ('page.show', [ 'categories' =>  $categories]);
    }

    public function showid($id)
    {
        $category = Category::find($id);

        return view ('page.detail', ['categories' => $category]);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        return view ('page.edit', ['categories' => $category]);
    }

    public function update($id,Request $request)
    {
        $request -> validate([
            'name' => 'required|string|max:255'
        ]);

        DB::table('categories')
            ->where('id',$id)
            ->update([
                'name' => $request->input('name')
            ]);

        return redirect ('/category');

    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();    

        return redirect('/category');

    }

}
