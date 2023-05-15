<div class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tag</h5>
                <button type="button" class="btn-close --close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tag</label>
                    <input type="text" class="form-control" name="edit-title" value={{$tag->title}}>
                    <div class="form-text">Please edit tag here</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary --close">Close</button>
                <button type="button" class="btn btn-primary --edit" data-url="{{route('tags-update', $tag)}}">Save changes</button>
            </div>
        </div>
    </div>
</div>
