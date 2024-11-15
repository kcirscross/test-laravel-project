<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    //
    public function index()
    {
        return response()->json(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tag|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        $tag = Tag::create($request->all());

        return response()->json($tag, 201);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:tag,name,' . $id . '|max:255',
            'color' => 'nullable|string|max:7',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return response()->json($tag);
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
