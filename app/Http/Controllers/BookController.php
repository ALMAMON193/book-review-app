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
    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('admin.book.edit-book', compact('book'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:0,1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->status = $request->input('status');
        $book->description = $request->description;
    
        if ($request->hasFile('cover_image')) {
            $imageName = time().'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('upload/books/'), $imageName);
            $book->cover_image = $imageName;
        }
    
        $book->save();
    
        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }
    
    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
    
        $notification = array(
            'message' => 'Book deleted successfully!',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }
}
