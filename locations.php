<?php
require_once('head.php');
require_once('nav.php');

if(isset($_GET['data'])){
    echo "lego GET ".$_GET['data'];
}else{
    echo "no llego GET";
}
?>

<?php require_once('footer.php') ?>