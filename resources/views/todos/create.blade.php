@extends('todos.layout')

@section('Content')

<div class="flex justify-between border-b pb-4 px-4">

	<h1 class="text-2xl pb-4">what next you need To-Do</h1>
	<a href="{{route('todo.index')}}" class="mx-5 py-2 text-blue-400 cursor-pointer">
	<span class="fas fa-arrow-left"/>
	</a>
	
</div>

		<x-alert >
		</x-alert >
		<form method="post" action="{{route('todo.store')}}" class="py-5">
			@csrf
			<div class="py-1">
				<input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title">
			</div>
			
			<div class="py-1">
				<textarea name="description" class="p-2 border rounded" placeholder="Description"></textarea>
			</div>

			<div class="py-2">
				<livewire:step />
			</div>
			
			<div class="py-1">
				<input type="submit" value="create" class="p-2 border rounded">
			</div>
		
		</form>

@endsection