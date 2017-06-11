<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de currículos</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<style src="https://unpkg.com/vue-multiselect@2.0.0-beta.14/dist/vue-multiselect.min.css"></style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
	  @include('partials.header')

  	<div class="container" id="app">
      @yield('content')
    </div>

    <script src="https://unpkg.com/vue-multiselect@2.0.0-beta.14"></script>
    <script src="js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>

    @stack('scripts')
</body>
</html>
