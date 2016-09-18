<section class="tasks">
    <h3>latest tasks</h3>
    @for($i=0 ; $i < count($tasks); $i++)
      <article class="task">
          <div class="delete"><a href="{{route('delete', ['task_id'=>$tasks[$i]->id])}}">x</a></div>
              {{ $tasks[$i]->task }}
          <div class="info">Created by <a href="{{ route('index',['author'=>$tasks[$i]->author->name])}}">{{$tasks[$i]->author->name}}  </a> on {{$tasks[$i]->created_at}} </div>   
      </article>
    @endfor



<!--form-->

    <div class="col-md-6 col-md-offset-3">
<section class="edit-tasks">
    <h1>Add a task</h1>
    <form method="post" action="{{route('create')}}">
       <div class="input-group">
       <label for="author">Your name</label>
       <input type="text" name="author" id="author" placeholder="Your Name" />
           
       </div>
       <div class="input-group">
       <label for="Task">Task</label>
       <textarea name="task" id="task" rows="5" placeholder="task"></textarea>
       </div>
       <button type="submit" class="btn">Submit Task</button>
       <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    </div>
    </div>
    </div>