<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function commentRegistration(Request $request)
    {
        $user = auth()->user();
        $comment = new Comment([
            'user_id' => $user->id,
            'item_id' => $request->input('item_id'),
            'comment' => $request->input('comment'),
        ]);
        
        $comment->save();

        return redirect()->back();
    }
}
