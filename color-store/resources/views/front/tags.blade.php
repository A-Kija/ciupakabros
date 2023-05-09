<div class="tags --tags">
    @foreach($product->tags as $tag)
    <div class="tag">{{$tag->title}}</div>
    @endforeach
    <div class="add --add">
        <input type="text" class="--add--new" data-product-id={{$product->id}} data-url="{{route('front-tags-list')}}">
        <div class="list --tags--list">

        </div>
    </div>
</div>
