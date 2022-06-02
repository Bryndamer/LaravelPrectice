@extends("layout.front")
@section("title", "Empleados vergas")
@section("body")
	<div class="row">
		<div class="col-12 text-center">
			<h1>Modulo de empleados</h1>
		</div>
	</div>
	<form id="frmEmpleado">
		@csrf
		<input type="hidden" id="txtId" name="txtId" value="0">
		<div class="row">
			<div class="col-4">
				<div class="form-group">
					<label for="txtNombre">Nombre</label>
					<input type="text" class="form-control" id="txtNombre" name="txtNombre">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtApellido">Apellido</label>
					<input type="text" class="form-control" id="txtApellido" name="txtApellido">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtEdad">Edad</label>
					<input type="text" class="form-control" id="txtEdad" name="txtEdad">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="form-group text-end">
					<button class="btn btn-outline-success" id="btnGuardar" type="button" onclick="Guardar()">Guardar</button>
					<button class="btn btn-outline-success" id="btnEditar" type="button" onclick="Editar()">Editar</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row">
		<div class="col-12">
			<table class="table nowrap display">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Edad</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach($empleados as $key => $value)

						<tr>
							<td>{{ $value["name"] }}</td>
							<td>{{ $value["apellido"] }}</td>
							<td>{{ $value["edad"] }}</td>
							<td>
								<button class="btn btn-outline-danger" id="btnEliminar" type="button" onclick="Eliminar({{$value["id"]}})">Eliminar</button>
								<button class="btn btn-outline-warning" id="btnEditar" type="button" onclick="Fill({{json_encode($value)}})">Editar</button>
							</td>
						</tr>

					@endforeach

				</tbody>
			</table>
		</div>
	</div>

@endsection

@section("js")

	<script>

		$(document).ready(function(){

			if($("#txtId").val() == 0){
				$("#btnEditar").hide();
			}

		});

		function Guardar(){

			$.ajax({
				type: "POST",
				url: "{{url('empleados/crear')}}",
				data: $("#frmEmpleado").serialize(),
				success: function(result){
					location.reload();
				}
			})

		}

		function Eliminar(id){

			$.ajax({
				type: "POST",
				url: "{{url('empleados/delete')}}",
				data: {id:id, '_token': '{{csrf_token()}}'},
				success: function(result){
					location.reload();
				}
			})

		}

		function Fill(v){

			$("#txtId").val(v.id);
			$("#txtNombre").val(v.name);
			$("#txtApellido").val(v.apellido);
			$("#txtEdad").val(v.edad);

			$("#btnEditar").show();
			$("#btnGuardar").hide();


		}

		function Editar(){

			$.ajax({
				type: "POST",
				url: "{{url('empleados/editar')}}",
				data: $("#frmEmpleado").serialize(),
				success: function(result){
					location.reload();
				}
			})

		}
	</script>

@endsection