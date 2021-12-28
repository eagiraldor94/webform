@extends('base')

@section('title','Customers table')

@section('headIncludes')
	<link href="https://{{$_SERVER['HTTP_HOST']}}/css/table.css" rel="stylesheet">
@endsection

@section('content')
	<div class="container">
		<table>
				<tr>
					<th>Código de cliente</th>
					<th>Nombre de usuario</th>
					<th>Contraseña generada</th>
					<th>Correo electrónico</th>
					<th>Cargo</th>
					<th>Teléfono fijo</th>
					<th>Celular</th>
					<th>Tipo de contacto</th>
					<th>Autorizado para Webstore</th>
					<th>Autorizado para ordenes</th>
					<th>Solicitó envío de usuario y contraseña</th>
				</tr>
				@if(count($customers)>0)
					@foreach($customers as $customer)
						<tr>
							<td>
								{{$customer->code}}
							</td>
							<td>
								{{$customer->user}}
							</td>
							<td>
								{{$customer->name}}
							</td>
							<td>
								{{$customer->password}}
							</td>
							<td>
								{{$customer->job}}
							</td>
							<td>
								{{$customer->phone}}
							</td>
							<td>
								{{$customer->mobile}}
							</td>
							<td>
								{{$customer->type}}
							</td>
							<td>
								@if($customer->webstore_auth)
									Si
								@else
									No
								@endif
							</td>
							<td>
								@if($customer->order_auth)
									Si
								@else
									No
								@endif
							</td>
							<td>
								@if($customer->password_send)
									Si
								@else
									No
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="11"> No hay datos para mostrar </td>
					</tr>
				@endif
		</table>
	</div>
@endsection