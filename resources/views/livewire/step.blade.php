<div>
	<div class="flex justify-center px-4">
		<h2 class="text-lg pb-4">add steps for tasks</h2>
		<span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"/>
	</div>

	@foreach($steps as $step)
	<div class="flex justify-center py-1" >
	<input wire:key="{{$step}}" type="text" name="step[]" class="py-1 px-2 border rounded" placeholder="{{'Describe Step '.($step+1)}}">
	<span wire:click="remove({{$step}})" class="fas fa-times text-red-400 p-2"></span>
	</div>
	@endforeach
    
</div>
