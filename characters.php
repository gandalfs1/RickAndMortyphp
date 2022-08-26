<?php
require_once('head.php');
require_once('nav.php');

/*
if(isset($_GET['data'])){
    echo "lego GET data".$_GET['data'];
}else{
    echo "no llego GET data";
}
echo "<hr>";
if(isset($_GET["page"])){
    echo "lego GET page ".$_GET['page'];
}else{
    echo "no llego GET page";
}*/

$characters = json_decode(file_get_contents($_GET['data']), true);



//$characters = json_decode(file_get_contents('https://rickandmortyapi.com/api/character?page=3'), true);
/*
foreach($characters as $key2 => $value){
  
    echo "<hr>";
    echo "$key";
   if($key2 == 'info' ){
    echo 'hola info';
    foreach($value as $keyinfo => $interno){
        echo "<br>";
        echo "entro a info value =>".$keyinfo;
        echo  ' <a class="btn btn-primary"  role="button">  '.$keyinfo.' </a>';
    }
   }
    echo "paso";
  // if($key == 'results' ){
  //  echo 'hola results';
 //  }
  
  // echo  ' <a class="btn btn-primary" href="'.$key.'.php" role="button" value="'.$value.'">  '.$key.' </a>';
   
}*/

//echo "<hr>"
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
                        $next = $interno;
                    break;
                    case 'prev':
                        $prev = $interno;
                     break;
                }
          if($keyinfo == 'pages') {
            
            ?>
            <h1>PAGES = <?php
                        echo $pages;
                        ?> de 
                
                        <?php echo $interno ; ?>
            </h1>
        <?php } ?>
       
        <?php 
    }
    ?>
    <div class=" container row justify-content-center text-center">
            <?php  if($prev) {?>
                <div class="col-sm-1"><a class="fs-3 text " aria-current="page"  href="characters.php?data=<?php echo $prev ?>"><ion-icon name="arrow-back-outline"></ion-icon></a></div>
            <?php }else{?>
                <div class="col-sm-1"><a class="fs-3 text " aria-current="page"  href="#"><ion-icon name="arrow-back-outline"></ion-icon></a></div>
            <?php } ?>
            <?php
            
            
            ?>
            <?php  if($next) {?>
                <div class="col-sm-1"><a class="fs-3 text " aria-current="page"  href="characters.php?data=<?php echo $next ?>"><ion-icon name="arrow-forward-outline"></ion-icon></a></div>
            <?php }else{?>
                <div class="col-sm-1"><a class="fs-3 text " aria-current="page"  href="characters.php?data=<?php echo $next ?>"><ion-icon name="arrow-forward-outline"></ion-icon></a></div>
            <?php } ?>
            
    </div>

    <?php
    //armar modulo
 }//fin if info
} ?>
 
 <div class="row g-4 p-4"> 
<?php 
  echo "<hr>";
foreach($characters as $key2 => $results){
   // echo json_encode($value);
    if($key2 == 'results' ){ 
        foreach($results as $keyinfo => $results_character){
            // se recorre para todos los personajes
        // echo $keyinfo;
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
                }
            }
            ?>
            <div class="col-3">
            <div class="card" style="width: 18rem;">
                <a class="card-img-top" onclick="showCharacter('<?php echo $url ?>')"><img src="<?php echo $ima ?>" id="imagen" alt="<?php echo $nombre ?>"></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nombre ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            
                
            </div>
                
            <?php
            
        // echo json_encode($interno);
        //echo $key2;
        }
    }
} 

?>
</div>
</div>

   
<script >
       function showCharacter(nombre){
        console.log(nombre)
        //alert(nombre)
        const modal = document.getElementById('modal')
        modal.classList.toggle('is-active')
       }

       function closeCharacter(){
        const modal = document.getElementById('modal')
         modal.classList.toggle('is-active')
       }
     

       

        </script>
<?php require_once('footer.php') ?>