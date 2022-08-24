<?php
$res = json_decode(file_get_contents('https://rickandmortyapi.com/api'), true);

/*
foreach($res as $key => $value){
  //  echo "<a href ='$value'>$key</a>";
    echo "<hr>";
    echo ' <a class="btn btn-primary" href="'.$key.'.php" role="button" value="'.$value.'">  '.$key.' </a>';
}
*/
//echo "<hr>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <a class="navbar-brand fs-3 text" href="#">menu volver</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav">
      <?php foreach($res as $key => $value): ?>
        <li class="nav-item">
          <a class="nav-link active fs-3 text" aria-current="page"  href="<?php echo $key ?>.php"><?php echo $key ?></a>
        </li>
    <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>