<div>
    <h3 class="text-center">لیست پیام ها</h3>
    <hr>
    <h5 class="my-3">لطفا نظرات خود را با ما به اشتراک بگذارید</h5>
    <form action="{{ route('comment.store')}}" method="POST">
        @csrf
        <input type="hidden" name="owner_id" value="{{ $owner_id}}">
        <input type="hidden" name="owner_type" value="{{ $owner_type}}">
        <textarea name="text" id=""  rows="4" placeholder="متن پیام" class="form-control my-2"></textarea>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">ارسال</button>
        </div>
    </form>

    @foreach ($list as $comment)
        <div class="d-flex flex-column bd-highlight mb-3">
            <div class="alert alert-info my-2">
                <div class="p-2 bd-highlight">{{$comment->user->name ?? '-'}}</div>
                <div class="p-2 bd-highlight">{{ $comment->text}}</div>
                <div class="p-2 bd-highlight">{{ persionDate($comment->created_at)}}</div>
                @if (auth()->check() && auth()->user()->role == 'admin')
                <form action="{{ route('remove.comment' , $comment->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
                @endif    
            </div>
        </div> 
    @endforeach

    