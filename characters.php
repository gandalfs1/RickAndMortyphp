<?php
require_once('head.php');
require_once('nav.php');


$characters = json_decode(file_get_contents($_GET['data']), true);
$cadena = $_GET['data'];
$pag_actual;

    if($cadena[strlen($cadena)-1] == 'r'){
        $pag_actual = 1;
    }else{
        $components = parse_url($cadena);
        parse_str($components['query'], $results);
        $pag_actual = $results['page'];
    }
?>
<br>


<?php foreach($characters as $key2 => $value){
if($key2 == 'info' ){ 
    foreach($value as $keyinfo => $interno){  
        switch($keyinfo){
                    case 'count':
                        $count = $interno;
                    break;
                    case 'pages':
                        $pages = $interno;
                     break;
                    case 'next':
                        if(isset($interno)){
                            $next = 'characters.php?data='.$interno;
                        }else{
                            $next = '#';
                        }
                    break;
                    case 'prev':
                       
                        if(isset($interno)){
                            $prev = 'characters.php?data='.$interno;
                        }else{
                            $prev = '#';
                        }
                     break;
                }
    }
    ?>
<?php require_once('nav_pages.php')?>
<?php
    //armar modulo
 }//fin if info
} ?>
<div class="container" id="fondo">
    <div class=" row g-4 ">
        <?php 
foreach($characters as $key2 => $results){
    if($key2 == 'results' ){ 
        foreach($results as $keyinfo => $results_character){?>
        
            <div class="  col-lg-3 col-sm-6">
            <div class="card2 ">
                <div class="face front">
                    <img src="<?php echo $results_character['image']?>" alt="">
                    <h3>
                    <?php echo $results_character['name']?>
                    </h3>
                </div>
                <div class="face back">
                    <h3>

                    </h3>
                    <p> <span>Tierra de Origen : <h5><?php echo $results_character['origin']['name']  ?></h5> </span>
                        <span>Especie : <h5><?php echo $results_character['species'] ?></h5> </span>
                    </p>
                    <div class="link">
                        <a href="#">More info.</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
    }
} 

?>

    </div>
</div>

<script>
function showCharacter(nombre) {
    console.log(nombre)
    //alert(nombre)
    const modal = document.getElementById('modal')
    modal.classList.toggle('is-active')
}

function closeCharacter() {
    const modal = document.getElementById('modal')
    modal.classList.toggle('is-active')
}
</script>

<?php require_once('pie.php')?>
<?php require_once('footer.php') ?>