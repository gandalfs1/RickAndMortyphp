<?php
echo "ho characters ---";

if(isset($_POST['boton'])){
    echo "lego POST";
}else{
    echo "no llego POST";
}
if(isset($_GET['boton'])){
    echo "lego GET".$_GET['boton'];
}else{
    echo "no llego GET";
}
?>