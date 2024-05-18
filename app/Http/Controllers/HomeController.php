<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $books = Book::where('status', 1)->paginate(8);
        return view('home', compact('books'));
    }

    public function details($id){
        $books = Book::findOrFail($id);
    
        if ($books->status == '0') {
            abort(404);
        }
    
        $relatedBooks = Book::where('status', 1)
                            ->inRandomOrder()
                            ->take(3)
                            ->where('id', '!=', $id)
                            ->get();
    
        foreach ($relatedBooks as $relatedBook) {
            if ($relatedBook->status == '0') {
                abort(404);
            }
        }
    
        return view('details', compact('books', 'relatedBooks'));
    }
    

   
}
