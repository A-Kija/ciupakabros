<div class="stars">
@for($i = 1; $i < 6; $i++)
    <input type="checkbox" id="_{{$i.'-'.$product->id}}" data-star="{{$i}}">
    <label class="star" for="_{{$i.'-'.$product->id}}"></label>
@endfor


</div>
