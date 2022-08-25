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

<h1>CHARACTES</h1>
<?php foreach($characters as $key2 => $value){
 if($key2 == 'info' ){ 
    foreach($value as $keyinfo => $interno){?>    
        <?php  if($keyinfo == 'count') {?>
            <h1>Total de personajes son <?php echo $interno  ?> </h1>
        <?php } ?>
        <?php  if($keyinfo == 'pages') {?>
            <h1>Total de paginas son <?php echo $interno ; ?> </h1>
        <?php } ?>
        <?php  if($keyinfo == 'next') {?>
            <h1>next <?php echo $interno ?> </h1>
            <a class="fs-3 text" aria-current="page"  href="characters.php?data=<?php echo $interno ?>"><?php echo $keyinfo ?></a>
        <?php } ?>
        <?php  if($keyinfo == 'prev') {
            if($interno) {?>
            <h1>prev<?php echo $interno  ?> </h1>
            <a class="fs-3 text" aria-current="page"  href="characters.php?data=<?php echo $interno ?>"><?php echo $keyinfo ?></a>
        <?php }
    } ?>
    <?php }
 }
} ?>

<?php 

foreach($characters as $key2 => $results){
   // echo json_encode($value);
 if($key2 == 'results' ){ 
    foreach($results as $keyinfo => $results_character){
        foreach($results_character as $key3){
            echo json_encode($key3);
            echo "<br>";
        }
        echo "<hr>";
       // echo json_encode($interno);
       //echo $key2;
    }
 }
} 

?>

<?php require_once('footer.php') ?>