<?php  include_once 'inc/header.php';?>

<?php 
$login =  Session::get("customerLogin");
if($login==false){
    header("Location:login.php");
}
?>
<?php 
    $cusid= Session::get("id");
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
						
            $customerUp = $cmr->customerUpdateinfo($_POST,$cusid);
        }
    ?>
<div class="main">
    <div class="content">
    <div class="section group">
   
    <h2 style="text-align:center;">My Profile</h2>
    <?php 
        $id=Session::get("id");
        $getcmrdata=$cmr->getCustomerData($id);
        if($getcmrdata){
            while($result=$getcmrdata->fetch_assoc()){
                
    
    ?>
    
    <form action="" method="post">
        <table class="tblpro">

            <tbody>
                <?php 
                    if(isset($customerUp)){
                        echo "<tr>
                        <td colspan='3' style='color:green;'> ".$customerUp."</td>
                        </tr>";
                    }
                ?>
                <tr>
                    <td colspan="3"><h3 style="font-size:18px;color:#979490;"> Update Profile Information</h3></td>
                </tr>
                <tr>
                    <td style="text-align:center;">Name</td>
                    <td  style="text-align:left;">:</td>
                    <td style="text-align:left;"><input type="text" name="names" Value="<?php echo $result['names'];?>"style="width: 80%;"/></td>
                </tr>
                <tr>
                    <td  style="text-align:center;">Email</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><input type="text" name="email" Value="<?php echo $result['email'];?>"style="width: 80%;"/></td>
                </tr>
                <tr>
                    <td  style="text-align:center;">Address</td>
                    <td style="text-align:left;">:</td>
                    <td  style="text-align:left;"><input type="text" name="address" Value="<?php echo $result['address'];?>"style="width: 80%;"/></td>
                </tr>
                <tr>
                    <td  style="text-align:center;">Division</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><input type="text" name="city" Value="<?php echo $result['city'];?>"style="width: 80%;"/></td>
                </tr>
                <tr>
                    <td style="text-align:center;">Phone</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><input type="text" name="phone" Value="<?php echo $result['phone'];?>"style="width: 80%;"/></td>
                </tr>
                <tr >
                    <td></td>
                    <td></td>                   
                    <td style="text-align:left;"><input type="submit" name="submit" Value="SAVE"/></td>
                </tr>
            </tbody>
        </table> 
        </form>
      <?php
                }
            }
      ?>
        </div>
    </div>
</div>
<?php  include_once 'inc/footer.php';?>