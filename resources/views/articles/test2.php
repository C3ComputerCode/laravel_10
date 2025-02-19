<!-- Display Validation Errors -->
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modalId = '{{ old('comment_id') }}';
            if (modalId) {
                var myModal = new bootstrap.Modal(document.getElementById('editCommentModal' + modalId));
                myModal.show();
            }
        });
    </script>
@endif

<!-- Display Comments -->
@foreach ($comments as $comment)
<div class="mb-3">
    <p>{{ $comment->content }}</p>
    <!-- Edit Button triggers Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comment->id }}">
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
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="comment{{ $comment->id }}" class="form-label">Comment</label>
                        <textarea class="form-control" id="comment{{ $comment->id }}" name="comment" required>{{ old('comment', $comment->content) }}</textarea>
                        @error('comment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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

<!-- Auto-open modal if session has open_modal -->
@if (session('open_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('editCommentModal{{ session('open_modal') }}'));
        modal.show();
    });
</script>
@endif
