@if (Auth::guard('admin') -> check())
    <form action="{{ route('threads.destroy', $thread->id) }}" method="post" class="mb-4">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="削除" onclick="return confirm('スレッドを削除します。本当に実行しますか？')">
    </form>
@else
    <form action="{{ route('messages.store', $thread->id) }}" method="POST" class="mb-1" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="thread-first-content">内容</label>
            <textarea name="body" id="thread-first-content" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="message-images">画像</label>
            <input type="file" class="form-control" id="message-images" name="images[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary mt-2">書き込む</button>
    </form>
@endif
