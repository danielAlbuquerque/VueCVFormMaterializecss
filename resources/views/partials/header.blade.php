<nav class="teal darken-3 z-depth-4" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="#" class="brand-logo">Cadastro de currículos</a>
    @if(!Auth::guest())
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li class="active"><a href="/home/">Currículos</a></li>
      <li><a href="/logout/">Sair</a></li>
    </ul>
    @endif

    @if(Auth::guest())
    <ul class="right hide-on-med-and-down">
      <li><a href="http://www.amcel.com.br"><i class="material-icons left">replay</i>Retornar para o site</a></li>
  </ul>
    <ul id="nav-mobile" class="side-nav">
      <li><a href="http://www.amcel.com.br">Retornar para o site</a></li>
    </ul>
    @endif
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
