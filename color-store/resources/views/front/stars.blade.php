<form action="{{route('front-vote', $product)}}" method="post">
    <div class="stars">
        @for($i = 1; $i < 6; $i++) 
            <input name="star[]" type="checkbox" 
            id="_{{$i.'-'.$product->id}}" data-star="{{$i}}"
            {{$product->rate >= $i ? ' checked' : ''}}
            >
            <label class="star{{ ceil($product->rate) == $i && $product->rate != $i ? ' half' : ''}}" for="_{{$i.'-'.$product->id}}"></label>
        @endfor
        <div class="result">
            @if($product->rate)
            {{$product->rate}} <span>({{$product->votes}} votes)</span>
            @else($condition)
            <span>No rating yet</span>
            @endif
        </div>
        @if($product->showVoteButton)
        <button type="submit" class="btn btn-info">vote</button>
        @endif
        @csrf
        @method('put')
    </div>
</form>
