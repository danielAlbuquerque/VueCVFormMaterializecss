@extends('layouts.app')


@section('content')
<div class="section">
	<div class="row">
		<div class="col s12">
			<table class="responsive-table striped bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CPF</th>
						<th>Dt. Cadastro</th>
						<th>Areas</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					@forelse($rows as $row)
					<tr>
						<td>{{$row->nome_completo}}</td>
						<td>{{$row->cpf}}</td>
						<td>{{$row->created_at->format('d/m/Y - h:i')}}</td>
						<td style="font-size: 10px;">
							@foreach($row->areas as $area)
							{{$area->descricao}} <br>
							@endforeach
						</td>
						<td>
							<a class='btn btn-flat' href='#'><i class="material-icons left">search</i>detalhes</a>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4" class="center-align blue-text text-darken-2">Nenhum currículo cadastrado</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="right-align fixed-action-btn">
			<a class="btn-floating btn-large waves-effect waves-light teal darken-1 right-align"><i class="material-icons">search</i></a>
		</div>
	</div>
</div>
@endsection
