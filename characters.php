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
<div class="modal" id="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Registrar Producto</p>
            <button class="delete" aria-label="close" onclick="closeCharacter()"></button>
        </header>
        <section class="modal-card-body">

        </section>
        <footer class="modal-card-foot">
            <button type="submit" class="button is-success">Guardar</button>
            </form>
            </form>
            </form>
        </footer>
    </div>
</div>
<div class="container ">

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
                        $next = 'characters.php?data='.$interno;
                    break;
                    case 'prev':
                        $prev = 'characters.php?data='.$interno;
                     break;
                }
    }
    ?>
    <!-- <div class="container row justify-content-center text-center align-items-center p-2">
        <?php  if($prev) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="characters.php?data=<?php echo $prev ?>">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php } ?>
        <h3 class="col-1 bg-light  rounded-5"><?php echo $pag_actual; ?></h3>

        <?php  if($next) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="characters.php?data=<?php echo $next ?>">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php } ?>

    </div> -->
    <?php require_once('nav_pages.php')?>
    <?php
    //armar modulo
 }//fin if info
} ?>

    <div class="row g-4 ">
        <?php 
 // echo "<hr>";
foreach($characters as $key2 => $results){
   // echo json_encode($value);
    if($key2 == 'results' ){ 
        foreach($results as $keyinfo => $results_character){
            // se recorre para todos los personajes
        // echo $keyinfo;
        //$zz = $results_character['origin']['name'];
        //echo $zz;
        /*
            foreach($results_character as $key3 => $datos){
            //se recorre para un solo personaje
           
                switch($key3){
                    case 'url':
                        $url = $datos;
                        break;
                    case 'image':
                        $ima = $datos;
                        break;
                    case 'name':
                        $nombre = $datos;
                    break;
                    case 'origin':
                       /* foreach($datos as $kx => $origen) {
                            switch($kx) {
                                case 'name':
                                    $name_origen = $origen;
                                break;
                            }
                        }*//*
                       // $name_origen = array_keys($datos,'origin');
                       $name_origen = $datos['name'];
                        //echo $name_origen;
                        //echo 'url is '.$datos['url'];
                    break;
                }
            }*/
            ?>
        <div class="col-lg-3 col-sm-6">
            <div class="card col-12" id="personaje">
                <div class="card-img-top  text-center flip-box">
                    <!--<a onclick="showCharacter('<?php echo $results_character['url'] ?>')"></a>-->
                    <div class="flip-box-front">
                        <img src="<?php echo $results_character['image'] ?>" id="imagen"
                            alt="<?php echo $results_character['name'] ?>">
                    </div>
                    <div class="flip-box-back">
                        <span>Tierra de Origen : <h5><?php echo $results_character['origin']['name']  ?></h5> </span>
                        <span>Especie : <h5><?php echo $results_character['species'] ?></h5> </span>
                        <?php  if( $results_character['type']){ ?><span>Tipo : <h5>
                                <?php echo $results_character['type'];?></h5> </span><?php }?>
                        <span>Genero : <h5><?php echo $results_character['gender']  ?></h5> </span>
                        <span>Cantidad de acapitulos : <h5><?php echo count($results_character['episode'])?></h5>
                        </span>

                    </div>
                </div>

                <div class="card-body bg-dark text-white" id="nombre">
                    <h5 class="card-title text-center "><?php echo $results_character['name'];?></h5>
                    <!--<p></p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
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