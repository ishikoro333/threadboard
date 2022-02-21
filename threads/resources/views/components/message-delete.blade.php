@if (Auth::guard('admin') -> check())
    <form action="{{ route('admin.message.destroy', [$thread, $message -> id]) }}" method="post" class="mb-4">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="削除" onclick="return confirm('メッセージを削除します。本当に実行しますか？')">
    </form>
@endif
