@extends('todos.layout')


@section('Content')

<div class="flex justify-between border-b pb-4 px-4">

	<h1 class="text-2xl">All Your ToDos</h1>
	<a href="{{route('todo.create')}}" class="mx-5 py-2 text-blue-400 cursor-pointer"><span class="fas fa-plus-circle px-2"/></a>
	
</div>
		
		<ul class="my-5 pl-4">
			<x-alert >
			</x-alert >
			@forelse($todos as $todo)


			<li class="flex justify-between py-1">

				<div>
					@include('todos.complete-button')
				</div>
				

				@if($todo->completed)
					<p class="line-through">{{$todo->title}}</p>
				@else
					<a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
				@endif

			
				<div>

					<a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 cursor-pointer"><span class="fas fa-edit px-2"/></a>

					<span onclick="event.preventDefault();
								if(confirm('Are you really want to delete?')){
								getElementById('form-delete-{{$todo->id}}')
								.submit()}" class="text-red-500 fas fa-trash cursor-pointer px-2"/>

					<form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy',$todo->id)}}">
					@csrf
					@method('delete')
					</form>
					
				</div>
			

			</li>

			@empty

				<p>No task, create one!</p>

			@endforelse
		</ul>

@endsection