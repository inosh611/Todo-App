<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class todoController extends Controller
{
    protected $task;
    public function __construct(){
        $this->task = new Todo();
    }


    public function index(){

        $responses['tasks'] = $this->task->all();
        return view('pages.todo.index')->with($responses);
    }
    public function store(Request $request){
        $this->task->create($request->all());

        return redirect()->back();
        // $this->task->title = $request->title;
        // $this->task->save();
    }
    public function delete($task_id){
        $task = $this->task->find($task_id);
        $task->delete();
        return redirect()->back();
    }

    public function done($task_id){
        $task = $this->task->find($task_id);
        $task->done=1;
        $task->update();

        return redirect()->back();
    }

   public function edit(Request $request){

    $response['task'] = $this->task->find($request['task_id']);
    return view('pages.todo.edit')->with($response);

}

    public function update(Request $request, $task_id){
        $task = $this->task->find($task_id);
        $task->update($this->pedit($task, $request->all()));
        return redirect()->back();
    }

    protected function pedit(Todo $task, array $data){
        return array_merge($task->toArray(), $data);
    }
}
