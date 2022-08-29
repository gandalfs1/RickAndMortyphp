<?php
require_once('head.php');
require_once('nav.php');

// if(isset($_GET['data'])){
//     echo "lego GET ".$_GET['data'];
// }else{
//     echo "no llego GET";
// }
// ?>
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

    //echo json_encode($next);
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

<div class="container">
    <table class="table table-responsive">
        <thead class="bg-dark">
            <tr>
                <th scope="col" class="text-light">Episodio</th>
                <th scope="col" class="text-light">Nombre</th>
                <th scope="col" class="text-light">Estreno</th>
            </tr>
        </thead>
        <tbody>

            <?php 
    foreach($episodes['results'] as $location){
       // echo "<hr>";
        ?>
            <tr>
                <th scope="row"><?php echo $location['episode'] ?></th>
                <td><?php echo $location['name'] ?></td>
                <td><?php echo $location['air_date'] ?></td>
            </tr>

            <?php
       // echo "id ".$location['id'];
       // echo "<hr>";
    }
    
?>

        </tbody>

    </table>
</div>
<?php require_once('pie.php')?>
<?php require_once('footer.php') ?>