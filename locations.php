<?php
require_once('head.php');
require_once('nav.php');

// if(isset($_GET['data'])){
//     echo "lego GET ".$_GET['data'];
// }else{
//     echo "no llego GET";
// }
?>
<br>
<?php 
$locations = json_decode(file_get_contents($_GET['data']), true);
//echo json_encode($locations);
if(isset($locations['info']['prev'])){
    $prev = 'locations.php?data='.$locations['info']['prev'];
}else{
    $prev = '#';
}
if(isset($locations['info']['next'])){
    $next = 'locations.php?data='.$locations['info']['next'];
}else{
    $next = '#';
}

$cadena_locations = $_GET['data'];
$pag_actual;

    if($cadena_locations[strlen($cadena_locations)-1] == 'n'){
        $pag_actual = 1;
    }else{
        $components_locations = parse_url($cadena_locations);
        parse_str($components_locations['query'], $results_locations);
        $pag_actual = $results_locations['page'];
    }
?>

<?php require_once('nav_pages.php')?>

<?php 
    foreach($locations['results'] as $location){
        echo "<hr>";
        ?>
        <div class="container">
            <li>Nombre: <?php echo $location['name'] ?></li>
            <li>Tipo: <?php echo $location['type'] ?></li>
            <li>Dimension: <?php echo $location['dimension'] ?></li>
            <li>Cantida residentes: <?php echo count($location['residents']) ?></li>
        </div>
<?php
       // echo "id ".$location['id'];
        echo "<hr>";
    }
?>
<?php require_once('footer.php') ?>