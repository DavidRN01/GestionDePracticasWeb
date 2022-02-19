/*utilizado cuando vamos a borrar una actividad*/
function confirmar(id) {

	Swal.fire({  
		title: '¿Quieres eliminar esta actividad?',  
		showDenyButton: true,
		confirmButtonText: 'Confirmar',
		denyButtonText: 'Cancelar',
	  }).then((result) => {  
		  if (result.isConfirmed) {
			window.location.href = "borrarActividad.php?id_actividad=" + id;
		  } else if (result.isDenied) {
			return false
		   }
	  });
		
}

/*usado para asegurar que los datos de los formularios son correctos*/
function validaractividad() {
	var tipo = document.getElementById("tipo_practica").value;
	var actividad = document.getElementById("actividad").value;
	var ok = true;

	if (tipo != "dual" && tipo != "Dual" && tipo != "FCT" && tipo != "fct") {
		Swal.fire({
			title: 'Error',
			text: 'El tipo de práctica debe ser FCT o Dual',
			icon: 'error',
			confirmButtonText: 'Reintentar'
		})
		ok = false;
	}
	if (actividad.length == 0) {
		Swal.fire({
			title: 'Error',
			text: 'Debes insertar un nombre para la actividad',
			icon: 'error',
			confirmButtonText: 'Reintentar'
		})
		ok = false;
	}
	return ok;
}