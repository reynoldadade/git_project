<?php
namespace App\Http\Controllers;

use App\Author;
use App\Task;

use Illuminate\Http\Request;
use App\Events\TaskCreated;  //call the file here to be able to use itin the controller
use Illuminate\Support\Facades\Event; //call the events facade to be able to use the event function

class TaskController extends Controller
{
	public function getIndex($author= null)
	{	//displaying tasks
		//$authors=Author::all();
		if(!is_null($author)){
			$task_author = Author::where('name', $author)->first();
			if($task_author){
				$tasks= $task_author->tasks()->orderBy('created_at','desc')->paginate(6);
			}
		}
		else{
			$tasks= Task::orderBy('created_at','desc')->paginate(6);
		}
		


		return view('index',['tasks'=>$tasks]);
		
	}
	public function postTask(Request $request)
	{
		$this->validate($request, [
			'author' => 'required|max:60' ,
			'task' => 'required|max:500'
			]);
		$authorText= ucfirst($request['author']);
		$taskText=$request['task'];
			// go into database and find the first instance of $authorText in the name column
		$author= author::where ('name',$authorText)-> first();
		 if(!$author){
		 	$author = new Author();
		 	$author->name = $authorText;
			$author->save();

					}	 	
		 $task= new Task();
		 $task->task= $taskText;
		 $author->tasks()->save($task);

		
		 Event::fire(new TaskCreated($author)); //this is called a facade,something that pretend to be something else but performs the same function.

		 	return redirect()->route('index')->with([
		 		'success'=>'Task saved!'
		 		]);



	}

	public function getDeleteTask($task_id){
		$task= Task::find($task_id);
		$author_deleted=false;
		//$task= Task::where('id',$task_id)->first(); same as the first method

		if (count($task->author->tasks)===1){
			$task->author->delete();
			$author_deleted=true;
		}

		$task->delete();

		$msg= $author_deleted ? 'Task and author deleted' : 'Task deleted!';

		$action='deleted';
		


		return redirect()->route('index')->with([
			'success'=>$msg
			
			]);
	}
}

