<?php  include_once 'inc/header.php';?>

<?php 
$login =  Session::get("customerLogin");
if($login==false){
    header("Location:login.php");
}
if(isset($_GET['orderid']) && $_GET['orderid']== 'order'){
    $cmrid= Session::get("id");
    $insertorder = $ct->orderProduct($cmrid);
    $deldata =$ct->delcartdata();
    header("Location:success.php");
}
?>
<style>
.order-details {
    float:left;
   
}
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="order-details col-lg-7 col-md-6 col-sm-3">
                <table class="tblone" >
                    <tr>
                        <th >Serial</th>
                        <th>Name</th>
                        <th >Image</th>
                        <th>Price</th>
                        <th >Quantity</th>
                        <th>Price</th>
                        <th >Action</th>
                    </tr>
                    <?php 
                        $getcartpd = $ct->getCartProduct();
                        if($getcartpd){
                            $i=0;
                            $sum=0;
                            while($result =$getcartpd->fetch_assoc()){
                                $i++;
                    
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productname'];?></td>
                        <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                        <td>৳<?php echo $result['price']; ?> ‎BDT </td>
                        <td><?php echo $result['quantity']; ?></td>
                        <td>৳
                        <?php 
                            $total = $result['price']* $result['quantity'];
                            echo $total;
                        ?>
                        </td>
                        <td><a onclick="return confirm('Are you Sure To cancel?')" href="?delpro=<?php echo $result['cartid'];?>">X</a></td>
                    </tr>
                <?php 
                    $sum = $sum+$total;
                    
                        }
                    }
                ?>
                </table>
               
                <table style="margin:0 auto;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td>TK : <?php echo $sum;?> BDT</td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td>TK.
                        <?php 
                        
                            $vat = $sum*0.1;
                            $grandtotal = $sum +$vat ;
                            echo $grandtotal;
                        
                        ?> BDT
                        </td>
                    </tr>
                </table>

            </div>
            <div class="order-details col-lg-5 col-md-6 col-sm-9">
                <?php 
                    $id=Session::get("id");
                    $getcmrdata=$cmr->getCustomerData($id);
                    if($getcmrdata){
                        while($result=$getcmrdata->fetch_assoc()){

                
                ?>
                <table class="tblpro" style="width: 100%;">

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
                        <tr>
                            <td style="text-align:left;">Age</td>
                            <td style="text-align:left;">:</td>                           
                            <td style="text-align:left;"><?php echo $result['birthday'];?></td>
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
        <div class="order">
            <a href="?orderid=order">Order</a>
        </div>
    </div>
</div>
<?php  include_once 'inc/footer.php';?>