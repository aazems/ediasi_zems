<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdeasisComment;
use App\Models\User;
use App\Models\Ideasis;

class IdeasisCommentController extends Controller
{
    public function index($ideasisId)
    {
        $comments = IdeasisComment::where('id', $ideasisId)->with('user')->get();
        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:ideasis,id',
            'user' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        IdeasisComment::create([
            'id' => $validated['id'],
            'user' => $validated['user'],
            'comment' => $validated['comment'],
            'created_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function update(Request $request, $id_comment)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = IdeasisComment::findOrFail($id_comment);
        $comment->update([
            'comment' => $validated['comment'],
            'updated_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    public function delete($id_comment)
    {
        $comment = IdeasisComment::findOrFail($id_comment);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
