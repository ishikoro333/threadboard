@extends('layouts.app')
@inject('message_service', 'App\Services\MessageService')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash-messages')
                {{ $threads->links() }}
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($threads as $thread)
                <div class="col-md-8 mb-5">
                    <div class="card text-left">
                        <div class="card-header">
                            <h3><span class="badge bg-primary">{{ $thread -> messages -> count() }} <small>レス</small></span></h3>
                            <h3 class="m-0">{{ $thread -> name }}</h3>
                        </div>
                        @foreach ($thread -> messages as $message)
                        @if ($loop -> index >= 5)
                            @continue
                        @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $loop -> iteration }} 投稿者:{{ $message -> user->name }}</h5>
                                <h6 class="card-title">投稿日時:{{$message -> created_at }}</h6>
                                <p class="card-text">{!! $message_service -> convertUrl($message -> body) !!}</p>
                            </div>
                        @endforeach
                        <div class="card-footer">
                            @include('components.message-create', compact('thread'))
                            <a href="{{ route('threads.show', $thread -> id) }}">全部読む</a>
                            <a href="{{ route('threads.show', $thread -> id) }}">最新50</a>
                            <a href="{{ route('threads.show', $thread -> id) }}">1-100</a>
                            <a href="{{ route('threads.index') }}">リロード</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                            <button type="submit" class="btn btn-primary mt-2">スレッド作成</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
