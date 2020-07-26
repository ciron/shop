<?php  include_once 'inc/header.php';?>

<?php 
$login =  Session::get("customerLogin");
if($login==false){
    header("Location:login.php");
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
        <table class="tblpro">

            <tbody>
                <tr>
                    <td style="text-align:left;">Name</td>
                    <td  style="text-align:left;">:</td>
                    <td style="text-align:left;"><?php echo $result['names'];?></td>
                </tr>
                <tr>
                    <td  style="text-align:left;">Email</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><?php echo $result['email'];?></td>
                </tr>
                <tr>
                    <td  style="text-align:left;">Address</td>
                    <td style="text-align:left;">:</td>
                    <td  style="text-align:left;"><?php echo $result['address'];?></td>
                </tr>
                <tr>
                    <td  style="text-align:left;">Division</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><?php echo $result['city'];?></td>
                </tr>
                <tr>
                    <td style="text-align:left;">Phone</td>
                    <td style="text-align:left;">:</td>
                    <td style="text-align:left;"><?php echo $result['phone'];?></td>
                </tr>
                <tr >
                    <td ></td>
                    
                    <td></td>
                    <td  style="text-align:left;"><a href="editprofile.php">Update Profile Information</a></td>
                </tr>
            </tbody>
        </table> 
      <?php
                }
            }
      ?>
        </div>
    </div>
</div>
<?php  include_once 'inc/footer.php';?>