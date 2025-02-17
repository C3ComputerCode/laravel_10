<!-- Comment List -->
@foreach ($comments as $comment)
<div class="mb-3">
    <p>{{ $comment->content }}</p>
    <!-- Edit Button triggers Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCommentModal">
        Edit
    </button>
</div>

<!-- Bootstrap Modal for Editing Comment -->
<div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editCommentLabel{{ $comment->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentLabel{{ $comment->id }}">Edit Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="comment{{ $comment->id }}" class="form-label">Comment</label>
                        <textarea class="form-control" id="comment{{ $comment->id }}" name="comment" required>{{ $comment->content }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
