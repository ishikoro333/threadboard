@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash-messages')
                <div class="card">
                    <h5 class="card-header">新規スレッド</h5>
                    <div class="card-body">
                        <form action="" method="POST">
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
