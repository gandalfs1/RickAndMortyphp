<div class="container">
    <div class="container row justify-content-center text-center align-items-center p-2">
        <?php  if($prev) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="<?php echo $prev ?>">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a></div>
        <?php } ?>
        <h3 class="col-1 bg-light  rounded-5"><?php echo $pag_actual; ?></h3>

        <?php  if($next) {?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="<?php echo $next ?>">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php }else{?>
        <div class="col-1"><a class="fs-4 text " aria-current="page" href="#">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a></div>
        <?php } ?>
    </div>
</div>