<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuadmin.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Buscar producto</div>
				<div class="card-body">
					<div class="form-group">
						<label>Filtro</label> <input name="filtro" id="filtro" type="text"
							class="form-control" placeholder="Digite valor" >
							
					</div>
					<div id="resultados"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
	var ruta;
	$("#filtro").keyup(function(){
		if($("#filtro").val()!=""){
			ruta = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/consultarproductoAjax.php"); ?>&filtro="+$("#filtro").val();
			$("#resultados").load(ruta);
		
		}
	});
});
</script>
