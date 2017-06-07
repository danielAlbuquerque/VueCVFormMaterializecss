<!DOCTYPE html>
<html>
<head>
	<title>AMCEL | Banco de currículos</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style type="text/css">
		.header {
			font-size: 1.1rem;
    		font-weight: 400;
    		text-transform: uppercase;
		}

		.top-buffer {
			padding-top: 8px;
		}
	</style>
</head>
<body>
	<nav class="teal darken-3 z-depth-4" role="navigation">
	    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">AMCEL - Currículos</a>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="www.amcel.com.br"><i class="material-icons left">replay</i>Retornar para o site</a></li>
	      </ul>

	      <ul id="nav-mobile" class="side-nav">
	        <li><a href="www.amcel.com.br">Retornar para o site</a></li>
	      </ul>
	      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	    </div>
  	</nav>

  	<div class="container">
    	<div class="section">
    		<div class="row">
    			<div class="col s12 m8  offset-m2">
    				<div class="card z-depth-2">
    					<form method="post">
    						{{csrf_field()}}
	    					<div class="card-content">
	    						<h5 class="header">Dados pessoais</h5>
	    						<div class="top-buffer"></div>
	    						<div class="row">
	    							<div class="input-field col s9">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Nome completo</label>
                          			</div>	
                          			<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">CPF</label>
                          			</div>	
	    						</div>
	    						<div class="row">
	    							<div class="input-field col s2">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">RG</label>
                          			</div>	
                          			<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Data Nascimento</label>
                          			</div>
                          			<div class="input-field col s7">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">E-Mail</label>
                          			</div>
	    						</div>
	    						<div class="row">
	    							<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Telefone Principal</label>
                          			</div>	
                          			<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Telefone Secundário</label>
                          			</div>
                          			<div class="input-field col s6">
	                            		<select>
				                          <option value="1">Manager</option>
				                          <option value="2">Developer</option>
				                          <option value="3">Business</option>
				                        </select>
	                            		<label for="first_name" class="">Escolaridade</label>
                          			</div>
	    						</div>
								<h5 class="header">Endereço</h5>
	    						<div class="top-buffer"></div>
	    						<div class="row">
	    							<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">CEP</label>
                          			</div>	
                          			<div class="input-field col s1">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">UF</label>
                          			</div>
                          			<div class="input-field col s3">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Cidade	</label>
                          			</div>
                          			<div class="input-field col s5">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Bairro	</label>
                          			</div>
	    						</div>
	    						<div class="row">
	    							<div class="input-field col s12">
	                            		<input id="name" type="text">
	                            		<label for="first_name" class="">Endereço</label>
                          			</div>
	    						</div>
	    						<h5 class="header">Área</h5>
	    						<div class="top-buffer"></div>
	    					</div>
	    					<div class="card-action">
	    						<button type="submit" class="waves-effect waves-light btn teal darken-3"><i class="material-icons left">done_all</i>Enviar</button>
	    					</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>	

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>