<!-- Modal -->
<div class="modal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body align-items-center">
                <!-- Modal content goes here -->
                <!-- Replace this with your form or other content -->
                <form class="editComment" method="PATCH" autocomplete="off">
                    @csrf
                    <label for="comment">New comment: </label>
                    <input type="text" id="new-content" name="newContent">
                    <input type="hidden" id="comment-id" name="commentId" value="{{ $comment->id }}">
                    <input type="hidden" id="post-id" name="postId" value="{{ $post->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
