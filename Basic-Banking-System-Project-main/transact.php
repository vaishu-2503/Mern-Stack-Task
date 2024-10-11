<?php
include "connection.php";
$id = $_GET['id'];
$sql = "select name from customers where id != '$id'";
$result = mysqli_query($con,$sql);
?>
<?php
function getSenderName($sender_id)
{
  include "connection.php";
  $sql = "select name from customers where id ='$sender_id'";
  if($q=mysqli_query($con,$sql))
  {
    $t=mysqli_fetch_array($q);
    $sender_name = $t[0];
    return $sender_name;
  }
  return"";
}
function getReceiverId($receiver_name)
{
  include "connection.php";
  $sql = "select id from customers where name = '$receiver_name'";
  if($q=mysqli_query($con,$sql))
  {
    $t=mysqli_fetch_array($q);
    $receiver_id = intval($t[0]);
    return $receiver_id;
  }
  return 1;
}
function executeTransaction($req_amount,$receiver_name)
{
    include "connection.php";
    $req_amount = intval($req_amount);
    $receiver_name=$receiver_name;
    $id = $_GET['id'];
    $sender_avail_amount_query = "select amount from customers where id = '$id'";
    if($q=mysqli_query($con,$sender_avail_amount_query))
        {
            $t=mysqli_fetch_array($q);
            $sender_avail_amount=intval($t[0]);
            if($sender_avail_amount<$req_amount) 
            {
                $val1=($req_amount-$sender_avail_amount);
               echo '<script>swal("Insufficient Balance !","The transaction amount is less than your current balance.","error")</script>';
                echo "
        <script>
            setTimeout(function() {
                window.location = 'view-table.php';
            }, 2000);
        </script>
    ";    
            }
            else if($sender_avail_amount>=$req_amount)
            {
  
                $receiver_avail_amount_query = "select amount from customers where name ='$receiver_name'";
                if($q1=mysqli_query($con,$receiver_avail_amount_query))
                {
                  $t1=mysqli_fetch_array($q1);
                  $receiver_avail_amount = intval($t1[0]);
                  
                  $updated_receiver_amount = $req_amount + $receiver_avail_amount;
                  
                  $update_receiver_amount_query = "update customers set amount =  '$updated_receiver_amount' where name = '$receiver_name'";
                  if(mysqli_query($con,$update_receiver_amount_query))
                  {
                    $rem_amount = $sender_avail_amount - $req_amount;
                    $update_sender_avail_amount_query = "update customers set amount = '$rem_amount' where id = '$id'";
                    if(mysqli_query($con,$update_sender_avail_amount_query))
                    {
                        echo '<script>
                        setTimeout(function() {
                            swal({
                                title: "Transaction Successfull!",
                                type: "success"
                            }, function() {
                                window.location = "view-table.php";
                            });
                        }, 1000);
                    </script>';
                    storeTransaction($id,$receiver_name,$req_amount);
                  
                    }
                    else 
                    {
                      echo " Sender amount deducted Unsuccessfully";
                    }
                  }
                  else
                  {
                    echo "<script> alert('Transaction Unsuccessfull')</script>";
                  }
                }
            } 
        }
}
function storeTransaction($sender_id,$receiver_name,$req_amount)
{
  include"connection.php";
  $sender_name = getSenderName($sender_id);
  $receiver_id = getReceiverId($receiver_name);
  date_default_timezone_set('Asia/Kolkata');
  $insert_transact = "insert into transactions(sender_id,sender_name,receiver_id,receiver_name,amount) values('$sender_id','$sender_name','$receiver_id','$receiver_name','$req_amount')";
 
  if(mysqli_query($con,$insert_transact))
  {
    
  }
  else 
  {
    echo "Error";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transact</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .box{
      width: 500px;
      margin: 90px auto;
      border: 2px solid black;
      border-radius: 5px;
      text-align: center;
    }
    .select{
      width: 50%;
      margin-left: 20px;
    }
    .from{
      margin:20px 50px 10px 20px;
    }
    .to{
      margin:20px 70px 10px 20px;
    }
    .amt{
      margin:20px 30px 10px 20px;
    }
   </style>
</head>
<body>
        <div class="box">
            <h2>Transaction</h2>
            <form method="post">                          
                            <label class="from">From</label>
                              <select name="sender" class="select">
                                <option value=""><?php echo $id ?></option>
                              </select><br>
                            <label class="to">To</label>
                              <select name="receiver-name" class="select">
                                <?php
                                  while (($row = mysqli_fetch_array($result))==true)
                                  {?>
                                      <option><?php echo $row['name'];?></option>
                                  <?php }?> 
                              </select><br>
                         
                            <label class="amt">Amount</label>
                              <input type="number" name = "req-amount" class="select">
                              <br><br><br><br><br>
                        
                             
                              <div class="from-group mb-3">
                               <center> <button type="submit" name="transact" class="btn btn-primary">Transact</button></center>
                              </div>
              </form>
          </div>

</body>
</html>
<?php
if(isset($_POST['transact']))
{
    $req_amount = $_POST['req-amount'];
    $receiver_name = $_POST['receiver-name'];
    executeTransaction($req_amount,$receiver_name);
}
?>

