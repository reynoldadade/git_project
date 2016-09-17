@extends('layouts.master')





@section('content')
  
  
    
<div class="container">

<div class="row">
<!--filter box-->

<div class="col-md-6 col-md-offset-3">
  
   @if(!empty(Request::segment(1)))
<div class="alert alert-info" role="alert">A filter has been set! <a href="{{ route('index')}}">Show all Tasks</a></div>
@endif

</div>
<div class="col-md-6 col-md-offset-3">

<!--getting the info box-->
@if(Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('success')}}
  </div>
   @endif
</div>

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
<div class="row">

@for($i=0 ; $i < count($tasks); $i++)
<div class="col-md-4">
    <div class="panel panel-default">
          <div class="panel-body">
            
            {{ $tasks[$i]->task }}
            <button type="button" class="close"  aria-label="Close"><span aria-hidden="true"><a href="{{route('delete', ['task_id'=>$tasks[$i]->id])}}">&times;</a></span></button>
            
          </div>
              <div class="panel-footer">Created by <a href="{{ route('index',['author'=>$tasks[$i]->author->name])}}">{{$tasks[$i]->author->name}}  </a> on {{$tasks[$i]->created_at}}</div>
    </div>
</div>

@endfor




<div class="row">
<div class="col-md-2 col-md-offset-5">
       
       @if($tasks->currentPage() !== 1)
         
                  
                <a href="{{$tasks->previousPageUrl()}}"><span class="glyphicon glyphicon-chevron-left"></span></a>
                  
          
       @endif 
        @if($tasks->currentPage() !== $tasks->lastPage() &&  $tasks->hasPages())
       
                  
                  <a href="{{$tasks->nextPageUrl()}}"><span class="glyphicon glyphicon-chevron-right"></span></a>
                  </ul>
          </nav>
        
                        
        @endif
    </div>

</div>
   
    

<div class="row">
<div class="col-md-2 col-md-offset-5">
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Create New Task
</button>
<div>
</div>





    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Task</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="{{route('create')}}">
        <div class="form-group">
       
       <label for="author">Your name</label>
       <input type="text" class="form-control" name="author" id="author" placeholder="Your Name" />
        </div>

       <div class="form-group">
       <label for="Task">Task</label>
       <textarea name="task" class="form-control" id="task" rows="5" placeholder="task"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Submit Task</button>
       <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
      </div>
      
    </div>
  </div>
</div>

@endsection