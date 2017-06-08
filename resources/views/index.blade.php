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
	<nav class="teal darken-3 z-depth-4" role="navigation">
	    <div class="nav-wrapper container">
	    	<a id="logo-container" href="#" class="brand-logo">Cadastro de currículos</a>
	      	<ul class="right hide-on-med-and-down">
	      		<li><a href="www.amcel.com.br"><i class="material-icons left">replay</i>Retornar para o site</a></li>
	      	</ul>
	      	<ul id="nav-mobile" class="side-nav">
	      		<li><a href="www.amcel.com.br">Retornar para o site</a></li>
	      	</ul>
	      	<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	    </div>
  	</nav>

  	<div class="container" id="app">
    	<form-curriculum> </form-curriculum>
    </div>	

    <script src="https://unpkg.com/vue-multiselect@2.0.0-beta.14"></script>
    <script src="js/app.js"></script>
	
</body>
</html>