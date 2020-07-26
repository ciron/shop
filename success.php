<?php  include_once 'inc/header.php';?>

<?php 
$login =  Session::get("customerLogin");
if($login==false){
    header("Location:login.php");
}
?>
<style>
    .payment{
        text-align:center;
        margin-bottom:50px;

    }
    .payment h3{
        font-size:22px;
        color:silver;
        margin:30px 30%;
        border-bottom:1px solid silver;
    }
    .payment a{
        padding:10px 20px;
        border:1px solid red;
        border-radius:10px;
        margin-bottom:20px;
        background:#e8d2d2;
        color:#483e3e;
    }
    .payment a:hover {
        background: #86767673;
        color: #f7f1f1;
        transition: all linear 0.3s;
    }
    .payment p{
        font-size:15px;
        color:#554f4f;
        margin:30px auto;
    }
    .payment .previous {
        background: #c7c7b7;
    border: 1px solid gray;
    padding: 10px 15px;
    border-radius: 15px;
    font-size: 15px;
    cursor: pointer;
    }
    .payment .previous:hover {
        background: #989494;
        color: #f5eeee;
        transition: all linear 0.3s;
    }
    .payment .odetails {
        padding:0px 10px;
        border:1px solid red;
        border-radius:10px;
        margin-bottom:20px;
        background:none;
        color:#483e3e;
    }
    .payment .odetails:hover {
       text-decoration:none;
        background:none;
        color:#483e3e;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
            <?php
                $cmrid= Session::get('id');
                $amount =  $ct->payableAmount($cmrid);
                if($amount){
               
                    while($result= $amount->fetch_assoc()){
                        $price = $result['price'];
                        Session::set("price",$price);
                       
                    }
                }
            ?>
                <h3>Order Success</h3>
                <p>Total payable Amount ৳
                <?php 
                     echo $price;
            
                ?>
                
                
                 BDT</p>
                <p>Thanks for Purchase Product our online Shop.we will contact as soon as possible with you.Here is your perchase.. <a href="order.php" class="odetails"> Details</a>
                 </p>
            </div>
        </div>
    </div>
</div>
<?php  include_once 'inc/footer.php';?>