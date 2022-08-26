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
<div class="container">

<?php foreach($characters as $key2 => $value){
if($key2 == 'info' ){ 
    foreach($value as $keyinfo => $interno){?>    
        <?php  if($keyinfo == 'count') {?>
            <!--<h1>Total de personajes son <?php echo $interno  ?> </h1>-->
        <?php } ?>
        <?php  if($keyinfo == 'pages') {
            $cadena = $_GET['data'];
            $rr = $cadena[strlen($cadena)-1];
            ?>
            <h1>PAGES = <?php
                
                        if($rr >=1){
                            if($rr= 'r'){
                                echo '1';
                                }else{
                                    echo $rr;
                                }
                            
                        }else{
                            echo "1";
                        }?> de 
                
                        <?php echo $interno ; ?>
            </h1>
        <?php } ?>
        <div class=" container ">
        <?php  if($keyinfo == 'next') {?>
            <div class="col-sm-4"><a class="fs-3 text " aria-current="page"  href="characters.php?data=<?php echo $interno ?>"><?php echo $keyinfo ?></a></div>
            
        <?php } ?>
        <?php  if($keyinfo == 'prev') {
            if($interno) {?>
            <div class="col-sm-4"><a class="fs-3 text " aria-current="page"  href="characters.php?data=<?php echo $interno ?>"><?php echo $keyinfo ?></a></div>
            
        <?php }
    } ?>
    </div>
    <?php }
 }
} ?>
 
    
<?php 
  echo "<hr>";
foreach($characters as $key2 => $results){
   // echo json_encode($value);
    if($key2 == 'results' ){ 
        foreach($results as $keyinfo => $results_character){
            // se recorre para todos los personajes
        // echo $keyinfo;
            foreach($results_character as $key3 => $datos){
                
                if($key3 == 'url'){                
                    // echo  $datos;
                    $url = $datos;
                }
                if($key3 == 'name'){                
                       // echo  $datos;
                        $nombre = $datos;
                }
                
                    //se recorre para un solo personaje
                switch($key3){
                    case 'image':
                        ?>
                        <a onclick="showCharacter('<?php echo $url ?>')">
                    <img src="<?php echo $datos ?>" class="" id="imagen">
                    <?php
                        break;
                }
              //  echo json_encode($key3);
               // echo json_encode($datos);
                // if($key3 == 'origin'){                
                //     foreach($datos as $datos_origin){
                //         echo "<br>";
                //         echo json_encode($key3." ".$datos_origin);
                //     }
                // }
                
            }
            
        // echo json_encode($interno);
        //echo $key2;
        }
    }
} 

?>
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