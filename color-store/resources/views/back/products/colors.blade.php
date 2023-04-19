@for($i = 0; $i < $colorsCount; $i++)
<div class="one-color">
<input type="color" name="color[]">
<input type="hidden" name="name[]">
<div class="color-view"></div>
</div>
@endfor