<?php  
    include_once 'include/header.php';
    include_once 'include/sidebar.php';
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
?>
<?php 
    if(!isset($_GET['msgid']) || ($_GET['msgid'])== NULL){
       echo "<script>window.location='inbox.php';</script>";
    }else {
        $id = $_GET['msgid'];
    }
     $cus= new Customer();
     if($_SERVER['REQUEST_METHOD']=='POST'){
        echo "<script>window.location='inbox.php';</script>";
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
               
                <?php
                $getcus = $cus->getCustomerMessage($id);

                if($getcus){
                  while ($result = $getcus->fetch_assoc()){
               
            ?>
            
                    <form action="" method="post">
                        <table class="form">					
                            <tr>
                                <td>Name :</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['names'];?>"class="medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail :</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['email'];?>"class="medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile :</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['mobile'];?>"class="medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['address'];?>"class="medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Message :</td>
                                <td>
                                    <input type="text" readonly="readonly" value="<?php echo $result['body'];?>"class="medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Prescription:</td>
                                <td><img src="../<?php echo $result['image'];?>" alt="" height="600px"width="500px"></td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Back" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php 
                        }

                        }
                    ?>
                </div>
            </div>
        </div>
<?php include 'include/footer.php';?>