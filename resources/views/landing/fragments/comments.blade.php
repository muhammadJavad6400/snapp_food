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
        <div class="alert alert-info my-2">
            {{ $comment->text }}
            <hr>
            {{ persionDate($comment->created_at) }}
        </div>
        
    @endforeach
</div>