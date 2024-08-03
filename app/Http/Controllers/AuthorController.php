<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $Authors = Author::all();
        return response()->json($Authors);
    }

    public function store(Request $request)
    {
        $author = new Author;
        $author->user_id = $request->user_id;
        $result = $author->save();

        if ($result) {
            return 'Data has been saved successfully';
        } else {
            return 'No data saved';
        }
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return response()->json($author);
    }

    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|string|max:255',
        ]);

        if (!is_null($request->user_id) && !User::find($request->user_id)) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $author->update($validatedData);
        return response()->json($author, 200);
    }

    public function destroy(Author $author)
    {
        $delete = $author->delete();
        if ($delete) {
            return response()->json('Author deleted successfully', 204);
        } else {
            return response()->json('Failed to delete the author', 500);
        }
    }
}
