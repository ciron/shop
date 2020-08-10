<?php 

include_once '../classes/product.php';
?>

 <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
    <?php 
        $pd = new product();
          $getcopy= $pd->getCopy();
          if($getcopy){
            while($value =  $getcopy->fetch_assoc()){

       
        ?>      
        <p>
         &copy; Copyright <a href="<?php echo $value['cpylink'];?>"><?php echo $value['copytext'];?></a>. All Rights Reserved.
        </p>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>
