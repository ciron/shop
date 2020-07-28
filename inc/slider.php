<?php 
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath.'/../classes/product.php');
  $pd = new product();
?>
<div class="header_bottom">
    <div class="header_bottom_left">
            <div class="section group">
            <?php 
                $getSquare = $pd->latestFromSquare();
                if($getSquare){
                    while($result=$getSquare->fetch_assoc()){

             
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                <h2 style="text-align:center;text-transform:uppercase;">Square</h2>
                    <div class="listimg listimg_2_of_1">
                            <a href="preview.php?proid=<?php  echo $result['productid'];  ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php  echo $result['productname'];  ?></h2>
                        <p><?php echo $fm->textShorten($result['body'],40); ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
                    </div>
                </div>
                <?php
                       }
                    }
                ?>	
                 <?php 
                $getSquare = $pd->latestFromIncepta();
                if($getSquare){
                    while($result=$getSquare->fetch_assoc()){

             
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                <h2 style="text-align:center;text-transform:uppercase;">Incepta</h2>
                    <div class="listimg listimg_2_of_1">
                            <a href="preview.php?proid=<?php  echo $result['productid'];  ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php  echo $result['productname'];  ?></h2>
                        <p><?php echo $fm->textShorten($result['body'],40); ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
                    </div>
                </div>
                <?php
                       }
                    }
                ?>			
                
            </div>
            <div class="section group">
            <?php 
                $getSquare = $pd->latestFromAcme();
                if($getSquare){
                    while($result=$getSquare->fetch_assoc()){

             
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                <h2 style="text-align:center;text-transform:uppercase;">Acme</h2>
                    <div class="listimg listimg_2_of_1">
                            <a href="preview.php?proid=<?php  echo $result['productid'];  ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php  echo $result['productname'];  ?></h2>
                        <p><?php echo $fm->textShorten($result['body'],40); ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
                    </div>
                </div>
                <?php
                       }
                    }
                ?>	
                 <?php 
                $getSquare = $pd->latestFromAci();
                if($getSquare){
                    while($result=$getSquare->fetch_assoc()){

             
            ?>
                <div class="listview_1_of_2 images_1_of_2">
                <h2 style="text-align:center;text-transform:uppercase;">Aci</h2>
                    <div class="listimg listimg_2_of_1">
                            <a href="preview.php?proid=<?php  echo $result['productid'];  ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php  echo $result['productname'];  ?></h2>
                        <p><?php echo $fm->textShorten($result['body'],40); ?></p>
                        <div class="button"><span><a href="preview.php?proid=<?php  echo $result['productid'];  ?>" class="details">Details</a></span></div>
                    </div>
                </div>
                <?php
                       }
                    }
                ?>	
            </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                   
                    <?php 
                   $getslideshow =$pd->getSlidershow();
                   if ($getslideshow){
                     
                       while($result=$getslideshow->fetch_assoc()){
                    ?>
                       <li>  <img src="admin/<?php echo $result['image'];?>" alt="<?php echo $result['title'];?>"title="<?php echo $result['title'];?>"/> </li>
                     <?php   
                            }
                     }
                     ?> 
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>