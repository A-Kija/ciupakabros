@if (Session::has('ok'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="alert alert-success mt-5">
                {{ Session::get('ok') }}
            </div>
        </div>
    </div>
</div>
@endif
@if (Session::has('info'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="alert alert-info mt-5">
                {{ Session::get('info') }}
            </div>
        </div>
    </div>
</div>
@endif
