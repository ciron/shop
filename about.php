<?php  
include_once 'inc/header.php';
include_once 'classes/product.php';
$pd = new product();
?>
<style>
    .payment{
        text-align:center;
        margin-bottom:50px;

    }
    .payment h3{
        font-size:22px;
        color:silver;
        margin:10px 30%;
        border-bottom:1px solid silver;
    }
    
    .payment p{
        font-size: 15px;
    color: #554f4f;
    margin: 0px 170px;
    }
  
    /* Small devices (landscape phones, 576px and up) */
@media (max-width: 576px) {  
    .payment p{
        font-size: 15px;
    color: #554f4f;
    margin: 0px 20px;
    }
}
 
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 576px to max-width: 991px) {  
    .payment p{
        font-size: 15px;
    color: #554f4f;
    margin: 0px 30px;
    }
}
 
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) { 
    .payment p{
        font-size: 15px;
    color: #554f4f;
    margin: 0px 50px;
    }
}
 
/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {  
    .payment p{
        font-size: 15px;
    color: #554f4f;
    margin: 0px 80px;
    }
}
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
            <?php
               
              
                $About =  $pd->getAbout();
                if($About){
               
                    while($result= $About->fetch_assoc()){
                       
             
            ?>
                <h3><?php echo $result['title']?></h3>                
                <p><?php echo $result['body']?>
                 </p>
                 <?php 
                           
                        }
                    }
                 ?>
            </div>
        </div>
    </div>
</div>
<?php  include_once 'inc/footer.php';?>