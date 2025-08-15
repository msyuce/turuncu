<!DOCTYPE html>
<html lang="en">

<head>
	{{-- HEAD --}}
	@include('partials.head')
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

	<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
		{{-- NAVBAR-HEADER --}}
		@include('partials.navbar-header')

		{{-- NAVBAR-CONTAINER --}}
		@include('partials.navbar-container')
	</nav>

	{{-- ASIDEBAR --}}
	@include('admin.asidebar')

	{{-- NAVBAR-SEARCH--}}
	@include('partials.navbar-search')

	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		{{-- LAYOUT --}}
		@include('admin.layout')
		
		{{-- JS --}}
		@include('partials.footer')
	</main>
	<!--========== END app main -->

	{{-- JS --}}
	@include('partials.script')
	
</body>

</html>