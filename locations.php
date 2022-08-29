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
$prev_locations = $locations['info']['prev'];
$next_locations = $locations['info']['next'];

$cadena_locations = $_GET['data'];
$pag_actual_locations;

    if($cadena_locations[strlen($cadena_locations)-1] == 'n'){
        $pag_actual_locations = 1;
    }else{
        $components_locations = parse_url($cadena_locations);
        parse_str($components_locations['query'], $results_locations);
        $pag_actual_locations = $results_locations['page'];
    }
?>

<div class="container">
    <div class="container row justify-content-center text-center align-items-center p-2">
        <?php  if($prev_locations) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="locations.php?data=<?php echo $prev_locations ?>">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php } ?>
        <h3 class="col-1 bg-light  rounded-5"><?php echo $pag_actual_locations; ?></h3>

        <?php  if($next_locations) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="locations.php?data=<?php echo $next_locations ?>">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php } ?>
    </div>
</div>

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