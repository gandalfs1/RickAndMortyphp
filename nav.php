<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  
  <a class="navbar-brand fs-3 text" href="index.php">home</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
    <?php foreach($res as $key => $value): ?>
      <li class="nav-item">
        <a class="nav-link active fs-3 text" aria-current="page"  href="<?php echo $key ?>.php?data=<?php echo $value ?>"><?php echo $key ?></a>
      </li>
  <?php endforeach; ?>
    </ul>
  </div>
</div>
</nav>