<div class="tags --tags">
    @foreach($product->tags as $tag)
    <div class="tag --tag">{{$tag->title}}</div>
    @endforeach
    <div class="add --add">
        <input type="text" class="--add--new" data-url="{{route('front-tags-list')}}">
        <div class="list --tags--list" data-url="{{route('front-add-tag', $product)}}">

        </div>
    </div>
</div>
