<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>REGISTER</title>
    <style>

      /* CSS for header */
      .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #006666;
            padding: 40px;
        }

        .header .logo {
            font-size: 40px;
            font-family: 'Franklin Gothic Medium', cursive;
            color: #FDFEFE;
            text-decoration: blink;
        }

        .nav-items {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #006666;
            scroll-margin-block: 120px;
        }

        .nav-items a {
            text-decoration: blink;
            font-size: 20px;
            color: #FDFEFE;
            padding: 10px 20px;
        }


      /* Custom styles for the form */
      body {
        background-color: #f8f9fa;
      }

      .form1 {
        background-color:#E6E6FA;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 75px 200px 75px 200px;
      }

      .form-group label {
        color: #333333;
        font-weight: bold;
      }

      .btn-primary {
        background-color:#006699;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color:#FF6633;
        border-color: #0056b3;
      }
      /* Reset styles for the footer */
      ul {
            margin: 0;
            padding: 0;
        }

       /* Footer styles */
       .footer-section {
            background: #006666;
            position: relative;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .footer-text p {
            margin-bottom: 14px;
            font-size: 14px;
            color: #ABEBC6;
            line-height: 28px;
        }

        .footer-widget-heading h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 40px;
            position: relative;
            color: #fff;
        }

        .footer-widget-heading h3::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -15px;
            height: 2px;
            width: 50px;
            background: #ff5e14;
        }

        .footer-widget ul li {
            display: inline-block;
            float: left;
            width: 50%;
            margin-bottom: 12px;
        }

        .footer-widget ul li a:hover {
            color: #ABEBC6;
        }

        .footer-widget ul li a {
            color: #ABEBC6;
            text-transform: capitalize;
        }

        .subscribe-form {
            position: relative;
            overflow: hidden;
        }

        .subscribe-form input {
            width: 100%;
            padding: 14px 28px;
            background: #2E2E2E;
            border: 1px solid #2E2E2E;
            color: #fff;
        }

        .subscribe-form button {
            position: absolute;
            right: 0;
            background: #ff5e14;
            padding: 13px 20px;
            border: 1px solid #ff5e14;
            top: 0;
        }

        .subscribe-form button i {
            color: #fff;
            font-size: 22px;
            transform: rotate(-6deg);
        }

        .copyright-area {
            background: #202020;
            padding: 25px 0;
        }

        .copyright-text {
            font-size: 14px;
            color: #ECF0F1;
        }

        .copyright-text p a {
            color: #ff5e14;
        }

        .footer-menu li {
            display: inline-block;
            margin-left: 20px;
        }

        .footer-menu li:hover a {
            color: #ff5e14;
        }

        .footer-menu li a {
            font-size: 14px;
            color: #878787;
        }
    </style>
  
<!-- Navigation -->
<header class="header">
        <div class="logo">𝐒 𝐓 𝐔 𝐃 𝐘 𝐁 𝐄 𝐄</div>
        <nav class="nav-items">
<a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"><a href="login.php" style="font-size: 80%;"><i class="fas fa-sign-in-alt"></i> Login</a>
        </nav>
    </header>


<!-- Page Content -->
<div class="form1 mt-4">
<h1 class="text-center">Please Register Here:</h1>
      <hr />
      <form action="" method="post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputFirstName">First Name</label>
            <input
              type="text"
              class="form-control"
              name="first_name"
              id="inputFirstName"
              placeholder="First"
            />
          </div>
          <div class="form-group col-md-4">
            <label for="inputMiddleName">Middle Name</label>
            <input
              type="text"
              class="form-control"
              name="middle_name"
              id="inputMiddleName"
              placeholder="Middle"
            />
          </div>
          <div class="form-group col-md-4">
            <label for="inputLastName">Last Name</label>
            <input
              type="text"
              class="form-control"
              name="last_name"
              id="inputLastName"
              placeholder="Last"
            />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="inputEmail4">Username</label>
              <input
                type="text"
                class="form-control"
                name="username"
                id="inputEmail4"
                placeholder="Email"
              />
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="inputPassword4">Password</label>
              <input
                type="password"
                class="form-control"
                name="password"
                id="inputPassword4"
                placeholder="Password"
              />
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="inputPassword4">Confirm Password</label>
              <input
                type="password"
                class="form-control"
                name="confirm_password"
                id="inputPassword"
                placeholder="Confirm Password"
              />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputAddress2">Address</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress2"
            placeholder="Apartment, studio, or floor"
          />
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity"  placeholder="City"/>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input type="text" id="inputState" class="form-control"  placeholder="State"/>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip"  placeholder="Code" />
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" />
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>

    <br>
    <br>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
  
  
  
    <footer class="footer-section">
      <div class="container">
          <div class="footer-cta pt-5 pb-5">
              <div class="row">
                  <div class="col-xl-4 col-lg-4 mb-50">
                      <div class="footer-widget-heading">
                        <h3>STUDYBEE </h3>
                          <div class="footer-text">
                              <p>There are no secrets to success. It is the result of preparation, hard work, and learning from failure.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 mb-6">
                      <div class="footer-widget">
                          <div class="footer-widget-heading">
                              <h3>Useful Links</h3>
                          </div>
                          <ul>
                              <li><a href="#">Home</a></li>
                              <li><a href="#">About</a></li>
                              <li><a href="#">About us</a></li>
                              <li><a href="#">Contact us</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-6 mb-6">
                      <div class="footer-widget">
                          <div class="footer-widget-heading">
                              <h3>Subscribe</h3>
                          </div>
                          <div class="footer-text mb-25">
                              <p>Daily Updates</p>
                          </div>
                          <div class="subscribe-form">
                              <form action="#">
                                  <input type="text" placeholder="Email Address">
                                  <button><i class="fab fa-telegram-plane"></i></button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  
          
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-center">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2023, All Rights Reserved <a href="https://codepen.io/anupkumar92/">Utkarsh</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </body>
</html>
