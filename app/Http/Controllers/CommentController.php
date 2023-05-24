<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        Comment::create([
            'shop_id' => $request->shop_id,
            'text' => $request->text
        ]);
        

        return back()->withMessage('پیام شما با موفقیت ارسال شد.');
        
    }
}
