<!DOCTYPE html>
<html>
<head>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	@livewireStyles
	<title>create todos</title>
</head>
<body>

	<div class="text-center flex justify-center pt-10">
		<div class="w-1/3 border border-gray-400 rounded py-4">
			@yield('Content')
		</div>
	

	</div>
	
	@livewireScripts

</body>
</html>