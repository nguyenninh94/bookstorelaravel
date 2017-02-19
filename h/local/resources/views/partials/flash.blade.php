@if(Session::has('status'))
    <div class="alert alert-success text-center">
        {{Session::get('status')}}
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-danger text-center">
        {{Session::get('warning')}}
    </div>
@endif