@extends('layouts.master')

@section('content')
<div class="container"> 
<div class="row">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
    @if(count($errors) >0)

        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           @foreach($errors->all() as $error)
        {{$error}}
       @endforeach
        </div>
         @endif
      </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
    @if(Session::has('fail'))

        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         {{ Session::get('fail')}} 
        </div>
         @endif
      </div>
    </div>

    <ul class="list-group">


<div class="col-md-6 col-md-offset-3">
<form role="form" method="post" action="{{route('admin.login')}}">
  <div class="form-group">
       
       <label for="name">Your name</label>
       <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" />
  </div>

  <div class="form-group">
       <label for="password">password</label>
       <input type="password" name="password" class="form-control" id="password" placeholder="password"></textarea>
  </div>
       <button type="submit" class="btn btn-primary">Submit</button>
       <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
</div>
</div>
</div>
@endsection