@if (Auth::guard('admin') -> check())
        <h5 class="card-header">レスを削除する</h5>
@else
        <h5 class="card-header">レスを投稿する</h5>
@endif
