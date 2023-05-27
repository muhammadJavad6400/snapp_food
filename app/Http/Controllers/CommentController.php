<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' , 'admin'])->only('remove'); 
        
    }
    
    public function store(Request $request)
    {
        // The Current User Is Logged In
        $currentLoggedInUser = auth()->user();

        if($currentLoggedInUser) {
            $class = 'App\Models\\'. $request->owner_type;
            Comment::create([
                'user_id' =>$currentLoggedInUser->id,
                'owner_id' => $request->owner_id,
                'owner_type' => $class,
                'text' => $request->text
            ]);
            return back()->withMessage('پیام شما با موفقیت ارسال شد.');
        }else {
            return back()->withError('لطفا ابتدا وارد حساب کاربری خود شوید.');
        }     
    }

    public function remove(Comment $comment)
    {
        $comment->delete();
        return back()->withMessage('پیام شما با موفقیت حذف شد.');   
    }
}
