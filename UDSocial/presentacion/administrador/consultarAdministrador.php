<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
if(isset($_GET['idAdministrador']) && isset($_GET['estado']) && $_GET['idAdministrador'] != $_SESSION['id']){
    $administradorEstado = new Administrador($_GET['idAdministrador'],"","","","",$_GET['estado']);
    $administradorEstado->cambiarEstado();
}
$administrador = new Administrador();
$registros = $administrador->consultarTodos();
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-info text-white">Consultar Administrador</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Estado</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($registros as $a){
							    echo "<tr>";
							    echo "<td>" . $a -> getNombre() . "</td>";
							    echo "<td>" . $a -> getApellido() . "</td>";
							    echo "<td>" . $a -> getCorreo() . "</td>";
							    echo "<td>" . $a -> getEstado() . "</td>";
							    echo "<td>";
							    if($_SESSION['id'] != $a -> getId()){
							        if($a->getEstado()==1){
							            echo "<a href='index.php?pid=" . base64_encode("presentacion/administrador/consultarAdministrador.php") . "&idAdministrador=" . $a -> getId() . "&estado=0'>";
							            echo "<i class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
							            echo "</a>";
							        }else{
							            echo "<a href='index.php?pid=" . base64_encode("presentacion/administrador/consultarAdministrador.php") . "&idAdministrador=" . $a -> getId() . "&estado=1'>";
							            echo "<i class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";							            
							            echo "</a>";
							        }
							    }
							    echo "</td>";
							    echo "</tr>";
							}							
							?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>