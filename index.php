<?php 
require 'connection2.php';

session_start();


// $retrieve = "SELECT * FROM `users`";
// $table_items = $conn->query($retrieve);
// $fetch3 = $table_items->fetch_assoc();

if(empty($_SESSION['role'])){
    $_SESSION['role'] = 'invalid';
}
if($_SESSION['role'] == 'admin'){
    header("location: admin_dashboard.php");
}
if($_SESSION['role'] == 'client'){
    header("location: client.php");
}


if(isset($_POST['signin'])){


    $email = $_POST['email'];
    $password = $_POST['password'];

    
    
    $select = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $list = $conn->query($select);
    $fetch = $list->fetch_assoc();
    $userFound = $list->num_rows;
    
    sleep(1);

    if($userFound == 1){
        
        $_SESSION['id'] = $fetch['id'];
        $_SESSION['role'] = $fetch['role'];

        if($_SESSION['role'] == 'admin'){
            header("location: admin_dashboard.php");
        }
        else{
            header("location: client.php");
        }
    
        
    }

    header('Refresh: 0');
    // echo $userFound;


    
}
// echo $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }
        form{
            width: 76%;
            margin-inline: auto;
        }
        .login {
            width: 520px;
            background-color: #ffffff;
            box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
            margin: 100px auto;
            padding: 40px;
        }
        .login form span {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 56px;
            height: 58px;
            background-color: #1f4087;
            color: #ffffff;
        }

        .swal-button {
            padding: 7px 31px;
            border-radius: 2px;
            background-color: #198754;
            font-size: 14px;
            }
    </style>
</head>
<body>
    <div class="login">
    <h1 class="text-center mb-5" style="letter-spacing: 4px;">LOGIN</h1>
        <form method="post">
            <div class="d-flex">
                <span><i class="fas fa-user"></i></span>
                <div class="form-floating mb-3 flex-grow-1">
                    <input type="email" class="form-control rounded-0" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
            </div>
            <div class="d-flex">
                <span><i class="fas fa-lock"></i></i></span>
                <div class="form-floating mb-3 flex-grow-1">
                    <input type="password" class="form-control rounded-0" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            <button type="submit" name="signin" class="btn btn-primary btn-lg mt-4 d-block mx-auto px-4">SIGN IN</button>
          </form>
    </div>

    


      <!-- <script>

        const btn = document.querySelector('.btn')

        btn.addEventListener('click', () =>{

            const inputEmail = document.querySelector('#floatingInput').value;
            const inputPass = document.querySelector('#floatingPassword').value;

            const email = "<?php echo $fetch3['email']?>";
            const password = "<?php echo $fetch3['password']?>";

            setTimeout(function() {

                if(inputEmail == email && inputPass == password){
                
                    const button = document.createElement('button')
                    button.innerHTML = "<a style='color: white; text-decoration: none;' href='admin_dashboard.php'>Proceed</a>"

                    button.classList = 'btn btn-primary float-end mb-3';

                swal({
                    title: "Success!",
                    text: "Redirecting to Admin Dashboard",
                    icon: "success",
                    button: false,
                    content: button,
                    
                }); 
                
                }

                else{
                    swal({
                        title: "Failed",
                        text: "Wrong Email or Password!. Try Again",
                        icon: "error",
                    }); 
                }
                
                }, 200);
                

                // console.log(inputEmail, inputPass);
            })

        
      </script> -->
      <?php require "footer.php" ?>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>