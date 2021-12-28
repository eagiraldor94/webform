@extends('base')

@section('title','Web Form')

@section('headIncludes')
	<link href="https://{{$_SERVER['HTTP_HOST']}}/css/form.css" rel="stylesheet">
@endsection

@section('content')
	{{-- Show created alert on customer created --}}
	@if($created === true)
		<div class="row">
				<div class="alert alert-success"> Contacto creado con éxito ! </div>
		</div>
	@endif
	{{-- Form Heading --}}
	<div class="row">
		<div class="col-11">
			<span><b>Información de contacto</b></span>
		</div>
		<div class="justify-content-end col-1 row"><small class="w-auto"><b>x</b></small></div>
	</div>
	{{-- Form Container --}}
	<div class="container">
		<form role="form" method="post" enctype="multipart/form-data" id="webform">
			@csrf
			{{-- Section about clients code --}}
			<div class="row" id="codeAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Código del cliente:</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="text" name="clientCode" id="clientCode" readonly value="{{$code}}">
				</div>
			</div>
			{{-- Section about username --}}
			<div class="row" id="userAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Usuario: *</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="text" name="user" id="user">
				</div>
			</div>
			{{-- Section about clients name --}}
			<div class="row" id="nameAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Nombre: *</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="text" name="name" id="name" placeholder="Nombre: *">
				</div>
			</div>
			{{-- Section about clients job --}}
			<div class="row" id="jobAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Cargo: *</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="text" name="job" id="job" placeholder="Cargo: *">
				</div>
			</div>
			{{-- Section about clients local phone --}}
			<div class="row" id="phoneAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Teléfono: *</span>
				</div>
				<div class="col-6 wm-container">
					<div id="watermark" class="d-none"><b>+57</b></div>
					<input required class="form-control" type="number" name="phone" id="phone" placeholder="Teléfono: *">
				</div>
			</div>
			{{-- Section about clients email --}}
			<div class="row" id="emailAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Correo Electrónico: *</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="email" name="email" id="email" placeholder="Correo Electrónico: *">
				</div>
			</div>
			{{-- Section about clients mobile phone --}}
			<div class="row" id="mobileAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Número celular: *</span>
				</div>
				<div class="col-6">
					<input required class="form-control" type="number" name="mobile" id="mobile" placeholder="Número celular: *">
				</div>
			</div>
			{{-- Section about clients contact type --}}
			<div class="row" id="typeAlert"></div>
			<div class="row">
				<div class="col-6">
					<span>Tipo de contacto: *</span>
				</div>
				<div class="col-6">
		            <select name="type" id="type" class="form-control" required>
		              <option value="">--Seleccione tipo de contacto--</option>
		              <option value="Contacto Comercial">Contacto Comercial</option>
		              <option value="Pago de factura">Pago de factura</option>
		              <option value="Representante legal">Representante legal</option>
		              <option value="Retiro de mercadería">Retiro de mercadería</option>
		            </select>
				</div>
			</div>
			{{-- Section about clients preferences and authorizations --}}
			<div class="row">
				<div class="col-6">
					<span>Autorizado para acceder a WebStore</span>
				</div>
				<div class="col-6">
					<input type="checkbox" name="webstoreAuth" id="webstoreAuth">
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<span>Autorizado para crear ordenes</span>
				</div>
				<div class="col-6">
					<input type="checkbox" name="orderAuth" id="orderAuth">
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<span>¿Desea que se envíe la información de acceso al usuario?</span>
				</div>
				<div class="col-6">
					<input type="checkbox" name="passwordSend" id="passwordSend">
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-4">
					<input class="btn btn-dark" type="button" name="btnSubmit" value="Aceptar" id="send">
					<input class="ml-1 btn btn-dark" type="button" name="clear" value="Cancelar" id="clear">
				</div>
			</div>
		</form>
	</div>

	
	<script src="https://{{$_SERVER['HTTP_HOST']}}/js/validations.js"></script>
@endsection

<div class="row podcast-card">
	<div class="col-12 col-sm-2">
		<div class="podcast-number">'+number'+</div>
	</div>
	<div class="row col-12 col-sm-10 shadow-container">
		<div class="col-4 col-sm-3 podcast-image">
			<img src="'+podcast.image+'">
		</div>
		<div class="col-8 col-sm-5 podcast-resume">
			<h2 class="podcast-title">'+podcast.title+'</h2>
			<div class="podcast-authors">by <span class="authors-names">'+podcast.publisher+'</span></div>
			<div class="podcast-episodes">'+podcast.total_episodes+'</span></div>
			<hr>
			<div class="podcast-links">
				<span class="itunes">
					<img src="/wp-content/plugins/podcast-api/public/assets/img/apple.svg">
					<a href="https://itunes.com/'+podcast.itunes_id+'">ITUNES</a>
				</span>
				<span class="website">
					<img src="/wp-content/plugins/podcast-api/public/assets/img/link.svg">
					<a href="'+podcast.website+'">WEB</a>
				</span>
				<span class="rss">
					<img src="/wp-content/plugins/podcast-api/public/assets/img/rss.svg">
					<a href="'+podcast.rss+'">RSS</a>
				</span>
			</div>
		</div>
		<div class="col-12 col-sm-4 podcast-description">
			'+podcast.description+'
		</div>
	</div>
</div>