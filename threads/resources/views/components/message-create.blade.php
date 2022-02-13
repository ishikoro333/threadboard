<form action="{{ route('messages.store', $thread->id) }}" method="POST" class="mb-5" enctype="multipart/form-data">
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
