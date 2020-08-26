<?php  include_once 'inc/header.php';?>

<?php 
$login =  Session::get("customerLogin");
if($login==false){
    header("Location:login.php");
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $orderid=$_POST['orderid'];
    $quantity=$_POST['quantity'];
   
    
    $updateorder = $ct->updateOrderquantity($orderid,$quantity);
    if($quantity<=0){
        $delproduct = $ct->delProOrder($orderid);
    }
}
if(isset($_GET['delorder'])){
    $orderid = $_GET['delorder'];
    $delOrdproduct = $ct->delProOrder($orderid);
}
?>
 <div class="main">
    <div class="content">
   
    <div class="section group">
     <h2 class="order-heading">Your Order Details </h2>
        <table class="tblone">
            <tr>
                <th >Serial</th>
                <th >Product Name</th>
                <th >Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php 
                 $cmrid= Session::get('id');
                $getOrder = $ct->getOrderProduct($cmrid);
                if($getOrder){
                    $i=0;
                    while($result =$getOrder->fetch_assoc()){
                        $i++;
            
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['productname'];?></td>
                <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="orderid" value="<?php echo $result['orderid']; ?>"/>
                        <?php 
                          if($result['status']=='0'){ ?>
                            <input type="number"name="quantity" value="<?php echo $result['quantity']; ?>"/>
                            <input type="submit" name="submit" value="Update"/>
                            <?php   }else {?>
                                <input type="number" readonly="readonly" name="quantity" value="<?php echo $result['quantity']; ?>"/>
                            <?php   }
                    
                        ?>
                       
                       </form>   
                    
                </td>
                <form action="" method="post">
                <td>৳ 
               
                 <?php  
                if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
                    $total = ($result['price']*$result['quantity'])-0.1;
                    echo $total;
                  }
                    $total = ($result['price']*$result['quantity']);
                    echo $total;
               
                ?>
                <input type="submit" name="submit" value="Confirm"/>
                </td>
                </form>
                <td><?php echo $fm->formatDate($result['date']);?></td>
                <td><?php 
                    if($result['status']=='0'){
                        echo "pending";
                    }else {
                        echo "shifted";
                    }
                
                
                ?></td>
                <?php 
                    if($result['status']=='0'){ 
                    ?>
                    <td>
                    <a onclick="return confirm('Are you Sure To cancel?')" href="?delorder=<?php echo $result['orderid'];?>">X</a>
                    </td>
                    <?php 
                        }else{
                        ?>
                    <td>N/A</td>
                        <?php }?>
             
            </tr>
            <?php 
               
                    }
                }
            ?>
        </table>
    </div>
 </div>
</div>
<?php  include_once 'inc/footer.php';?>