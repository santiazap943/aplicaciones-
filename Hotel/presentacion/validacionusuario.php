<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "usuario"){
        $usuario = new Usuario($_SESSION['id']);
        $usuario -> consultar();
        if($usuario -> getEstado() == 0) {
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