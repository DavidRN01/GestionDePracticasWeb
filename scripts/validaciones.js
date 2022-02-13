/*utilizado cuando vamos a borrar, insertar, o editar una actividad*/
function confirmar() {
	if (!confirm("¿Estás seguro?"))
		return false;
	else
		return true;
}

/*usado para asegurar que los datos de los formularios son correctos*/
function validaractividad() {
	var tipo = document.getElementById("tipo_practica").value;
	var actividad = document.getElementById("actividad").value;
	var ok = true;

	if (tipo != "dual" && tipo != "Dual" && tipo != "FCT" && tipo != "fct") {
		alert("El tipo de práctica tiene que ser FCT o Dual");
		ok = false;
	}
	if (actividad.length == 0) {
		alert("Nombre de actividad requerido");
		ok = false;
	}
	return ok;
}