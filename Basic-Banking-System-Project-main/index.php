<?php
function insert($name,$mail,$amount)
{
 
  include "connection.php";
  $sql = "insert into customers(name,mail,amount) values('$name','$mail','$amount')";
  if(mysqli_query($con,$sql))
  {
    echo '<script>
                        setTimeout(function() {
                            swal({
                                title: "Registration Successfull!",
                                type: "success"
                            }, function() {
                                window.location = "index.php";
                            });
                        }, 1000);
                    </script>';
  }
  else
  {
    echo '<script>
                        setTimeout(function() {
                            swal({
                                title: "Registration Failed!",
                                type: "fail"
                            }, function() {
                                window.location = "index.php";
                            });
                        }, 1000);
                    </script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <style>
    
        .header{
            padding: 50px 80px;
            margin: 50px auto; 
            height: 700px;
        }
        .form{
            text-align: center;
            color: #fff;
            width: 450px;
            height: 450px;
            border-radius: 10px;
        }
        .ip{
          margin: 10px auto;
          width: 70%;
          height: 30px;
          border-radius: 3px;
          border: none;
          padding-left: 5px;
        }
        .ip:focus{
          outline: none;
        }
        .btn{
          margin-top: 30px;
        }
        .navbar{
        padding: 10px 80px;
        z-index: 1;
        position: fixed;
        width: 100%;
        top: 0;
    }
    .nav-item{
        margin: 0 20px;
    }
    
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Elite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view-table.php">Customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transactions.php">Transactions</a>
            </li>
          </ul>
        </div>
      </nav>

      <section class="header">
          <div class="row">
              <div class="col-lg-6" style="text-align: center;">
                  <h1 style="font-family:'Poppins', sans-serif;font-size:80px;margin-top:10%">Welcome to <br> Elite Bank</h1>
              </div>
              <div class="col-lg-6">
                <div class="form bg-dark">
                    <br>
                    <h3>Join Now</h3>
                    <br>
                    <form method="post" action="">
                        <input class="ip" type="text" name="name" id="" placeholder="Name"><br>
                        <input class="ip" type="email" name="mail" id="" placeholder="e-mail"><br>
                        <input class="ip" type="text" name="city" id="" placeholder="City"><br>
                        <input class="ip" type="number" name="amount" id="" placeholder="Amount"><br>
                        <input class="btn btn-outline-light btn-lg" type="submit" name="join-now" value="Create" >
                    </form>
                </div>
          </div>
      </section>
</body>
</html>
<?php
if(isset($_POST['join-now']))
{
  $name = $_POST['name'];
  $mail = $_POST['mail'];
  $amount = $_POST['amount'];
  insert($name,$mail,$amount);
}