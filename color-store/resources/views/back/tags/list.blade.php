@forelse($tags as $tag)
<li class="list-group-item">
    <div class="cat-line">
        <div class="cat-info">
            <h2>{{$tag->title}}</h2>
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-outline-success --edit" data-url="{{route('tags-show-modal', $tag)}}">edit</button>
            <button type="button" class="btn btn-outline-danger --delete" data-url="{{route('tags-delete', $tag)}}">delete</button>
        </div>
    </div>
</li>
@empty
<li class="list-group-item">
    <div class="cat-line">No Tags</div>
</li>
@endforelse
