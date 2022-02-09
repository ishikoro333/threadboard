@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{ $threads->links() }}
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($threads as $thread)
                <div class="col-md-8 mb-5">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="m-0">{{ $thread -> name }}</h3>
                        </div>
                        @foreach ($thread->messages as $message)
                            <div class="card-body">
                                <h5 class="card-title">{{ $loop->iteration }} 名前:{{ $message->user->name }}:{{$message->created_at }}</h5>
                                <p class="card-text">{{ $message->body }}</p>
                            </div>
                        @endforeach
                        <div class="card-footer">
                            <form action="" method="POST" class="mb-5">
                                @csrf
                                <div class="form-group">
                                    <label for="thread-first-content">内容</label>
                                    <textarea name="body" id="thread-first-content" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">書き込む</button>
                            </form>
                            <a href="">全部読む</a>
                            <a href="">最新</a>
                            <a href="">1-100</a>
                            <a href="">リロード</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash-messages')
                <div class="card">
                    <h5 class="card-header">新規スレッド</h5>
                    <div class="card-body">
                        <form action="{{ route('threads.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="thread-title" class="
                                ">スレッドタイトル</label>
                                <input name="name" id="thread-title" type="text" class="form-control" placeholder="タイトル">
                            </div>
                            <div class="form-group">
                                <label for="thread-first-content" class="">内容</label>
                                <textarea name="content" id="thread-first-content" rows="3" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-primary mt-2">スレッド作成</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
