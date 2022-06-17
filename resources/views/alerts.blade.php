@if(Session::has('error'))
    <div class="alert alert-danger">{!! Session::get('error') !!}</div>
@endif
@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if(Session::has('success'))
    <div class="alert alert-succssess" style="color:
#155724;
background-color:
#d4edda;
border-color:
#c3e6cb;">{{ Session::get('success') }}</div>
@endif
@if(Session::has('status'))
    <div class="alert alert-success">{!! Session::get('status') !!}</div>
@endif