<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->type = $request->type;
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->description = $request->description;
        $book->category = $request->category;
        $book->rating = $request->rating;
        $book->year_published = $request->year_published;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->price = $request->price;
        $book->language = $request->language;
        $book->cover_image = $request->cover_image;
        $book->availability_status = $request->availability_status;
        $book->genre = $request->genre;
        $book->format = $request->format;
        $book->dimensions = $request->dimensions;
        $result = $book->save();
        if ($result) {
            return 'Data has been saved successfully';
        } else {
            return 'Result => No data saved';

        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'author_id' => 'nullable|exists:authors,id',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'year_published' => 'nullable|integer',
            'publisher' => 'nullable|string|max:255',
            'pages' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'language' => 'nullable|string|max:255',
            'cover_image' => 'nullable|string|max:255',
            'availability_status' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'format' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
        ]);

        $book->update($validatedData);
        return response()->json($book, 200);
    }

    public function destroy(Book $book)
    {
        $delete = $book->delete();
        if ($delete) {
            return response()->json('Book deleted successfully', 204);
        } else {
            return response()->json('Failed to delete the book', 500);
        }
    }
}
