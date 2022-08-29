<?php
require_once('head.php');
require_once('nav.php');

if(isset($_GET['data'])){
    echo "lego GET ".$_GET['data'];
}else{
    echo "no llego GET";
}
?>
<br>
<?php 
$episodes = json_decode(file_get_contents($_GET['data']), true);
//echo json_encode($episodes);

if(isset($episodes['info']['prev'])){
    $prev = 'episodes.php?data='.$episodes['info']['prev'];
}else{
    $prev = '#';
}
if(isset($episodes['info']['next'])){
    $next = 'episodes.php?data='.$episodes['info']['next'];
}else{
    $next = '#';
}

echo json_encode($next);
$cadena_episodes = $_GET['data'];
$pag_actual;

    if($cadena_episodes[strlen($cadena_episodes)-1] == 'e'){
        $pag_actual = 1;
    }else{
        $components_episodes = parse_url($cadena_episodes);
        parse_str($components_episodes['query'], $results_episodes);
        $pag_actual = $results_episodes['page'];
    }
?>

<?php require_once('nav_pages.php')?>

<?php 
    foreach($episodes['results'] as $location){
        echo "<hr>";
        ?>
        <div class="container">
            <li>Nombre: <?php echo $location['name'] ?></li>
            <li>Estreno: <?php echo $location['air_date'] ?></li>
            <li>Episodio: <?php echo $location['episode'] ?></li>
            <li>Cantida personajes: <?php echo count($location['characters']) ?></li>
        </div>
<?php
       // echo "id ".$location['id'];
        echo "<hr>";
    }
?>
<?php require_once('footer.php') ?>