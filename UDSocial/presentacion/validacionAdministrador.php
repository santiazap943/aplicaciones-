<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "administrador"){
        $administrador = new Administrador($_SESSION['id']);
        $administrador -> consultar();
        if($administrador -> getEstado() == 0) {
            header('Location: index.php');            
        }
    }else{
        $pid = base64_encode("presentacion/error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>