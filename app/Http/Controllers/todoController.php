<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\SubTask;
use Illuminate\Http\Request;

class todoController extends Controller
{
    protected $task;
    protected $sub;
    public function __construct(){
        $this->task = new Todo();
        $this->sub = new SubTask();
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



    public function sub($task_id){
        $response['task'] = $this->task->find($task_id);
        $response['sub_task'] = $this->sub->getSubTaskByTask($task_id);
        // dd($response);
        return view('pages.todo.sub')->with($response);
    }

//Subtask
    public function subStore(Request $request){
        $this->sub->create($request->all());

        return redirect()->back();
    }
}
