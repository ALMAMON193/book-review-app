<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
         $books = Book::all();
         return view('admin.book.view-book', compact('books'));
        
    }
    public function create(){
        
        return view('admin.book.add-book');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ],
    [
        'cover_image.image' => 'The file must be an image (jpeg, png, jpg, gif).',
        'cover_image.mimes' => 'The file must be a valid image format (jpeg, png, jpg, gif).',
        'cover_image.max' => 'The file size cannot exceed 2MB.',
        'title.required' => 'The title field is required.',
        'author.required' => 'The author field is required.',
        'publisher.required' => 'The publisher field is required.',
        'description.required' => 'The description field is required.',
    ]);

        $book = new Book();
        $book->Title = $request->input('Title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->description = $request->input('description');

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/books/'), $filename);
            
            $book->cover_image = $filename;
        }
    

        $book->save();

        return redirect()->back()->with('success', 'Book created successfully.');
    }
}
