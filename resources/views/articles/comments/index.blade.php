<div class="card">
    <div class="card-block">
        <form method="POST" action="/articles/{id}/comment">
            {{ csrf_field() }}
            <div class="form-group comment-area">
                <textarea name="body" placeholder="댓글 작성" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">댓글 작성</button>
            </div>
        </form>
    </div>
</div>