<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\todoCreateRequest;
use Illuminate\SUPPORT\FACADES\DB;
use App\Models\todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function __construct (){
        // $this->middleware('auth')->except('index');
        //$this->middleware('auth')->only('index');
        $this->middleware('auth');
    }

    public function index (){
    	//$todos = todo::all();
        // $todos = todo::orderby('completed')->get();
        //$todos = todo::orderby('completed', 'desc')->get();
    	//return view('todos.index')->with(['todos'=>$todos]);
        // $todos = auth()->user()->todos()->orderby('completed')->get();
        $todos = auth()->user()->todos->sortby('completed');
    	return view('todos.index', compact('todos'));
    }

    public function create (){
    	return view('todos.create');
    }

    public function store (todoCreateRequest $Request){

 //    	$rules = [
 //    		'title'=>'required|max:255',
 //    	];

 //    	$messages = [
 //    		'title.required' => 'fill the title madafaker.',
	// 	];

	// $validator = Validator::make($Request->all(), $rules, $messages);

	// if($validator->fails()){
	// 	return redirect()->back()
	// 					->withErrors($validator)
	// 					->withInput();
	// }

    /////////////

    	// $Request->validate([
    	// 	'title'=>'required|max:255',
    	// ]);

        $todo = auth()->user()->todos()->create($Request->all());

        if ($Request->step){
            foreach ($Request->step as $step) {
                $todo->steps()->create(['name'=>$step]);
            }
        }   

    	// todo::create($Request->all());
    	return redirect(route('todo.index'))->with('message','ToDo created successfully');
    	
    }

    public function edit (Todo $todo){
 
    	return view('todos.edit',compact('todo'));
    }

    public function show (todo $todo){
        return view('todos.show', compact('todo'));
    }


    public function update (todoCreateRequest $request,Todo $todo){
 		$todo->update(['title'=>$request->title, 'description'=>$request->description]);

 		return redirect(route('todo.index'))->with('message','UPDATED!');
    	
    }

    public function complete (Todo $todo){
        $todo->update(['completed'=>true]);

        return redirect()->back()->with('message','task marked as completed!');
        
    }

    public function incomplete (Todo $todo){
        $todo->update(['completed'=>false]);

        return redirect()->back()->with('message','task marked as Incompleted!');
        
    }

    public function destroy (Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();

        return redirect()->back()->with('message','task deleted!');
        
    }

}
