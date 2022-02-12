<form action="{{ route('messages.store', $thread->id) }}" method="POST" class="mb-5">
                                @csrf
                                <div class="form-group">
                                    <label for="thread-first-content">内容</label>
                                    <textarea name="body" id="thread-first-content" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary m-2">書き込む</button>
                            </form>
