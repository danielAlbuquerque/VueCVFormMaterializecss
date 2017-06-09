@extends('layouts.app')

@push('scripts')
<script>
@if ($errors->has('email') || $errors->has('password'))
    Materialize.toast('Acesso negado', 4000, 'rounded')
@endif
</script>
@endpush

@section('content')
<style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
<main>
    <center>

      <div class="section"></div>

      <h5 class="teal-text">Amapá Florestal e celulose S.A</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <form class="col s12" method="post" action="{{route("login")}}">
            {{ csrf_field() }}
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input value="{{old('email')}}" class='validate' type='email' name='email' id='email' />
                <label for='email'>Digite o seu usuário</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input value="{{old('password')}}" class='validate' type='password' name='password' id='password' />
                <label for='password'>Digite a sua senha</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Esqueceu sua senha?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect teal'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>

    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

@endsection
