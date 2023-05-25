<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $class = 'App\Models\\'. $request->owner_type;
        Comment::create([
            'owner_id' => $request->owner_id,
            'owner_type' => $class,
            'text' => $request->text
        ]);
        

        return back()->withMessage('پیام شما با موفقیت ارسال شد.');
        
    }
}
