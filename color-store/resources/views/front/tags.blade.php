<div class="tags --tags" data-url="{{route('front-delete-tag', $product)}}">
    @foreach($product->tags as $tag)
    <div class="tag --tag" data-id="{{$tag->id}}">{{$tag->title}}<i></i></div>
    @endforeach
    <div class="add --add">
        <input type="text" class="--add--new" data-url="{{route('front-tags-list')}}">
        <button type="button" class="btn btn-info --new" data-url="{{route('front-add-new-tag', $product)}}")>add</button>
        <div class="list --tags--list" data-url="{{route('front-add-tag', $product)}}">
        </div>
    </div>
</div>