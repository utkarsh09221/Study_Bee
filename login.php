<?php
session_start();

// If user is already logged in, redirect to courses page
if (isset($_SESSION['username'])) {
    header("Location: courses.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check for empty fields
    if (empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
        $err = "Please enter both username and password.";
    } else {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    }

    // If no error, proceed to validate user
    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                // Check if username exists
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        // Verify password
                        if (password_verify($password, $hashed_password)) {
                            // Successful login
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            header("Location: courses.php");
                            exit;
                        } else {
                            $err = "Incorrect password.";
                        }
                    }
                } else {
                    $err = "Username not found.";
                }
            } else {
                $err = "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>LOGIN</title>
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
        font-size: 45px;
        font-family: 'Franklin Gothic Medium', cursive;
        color: #fdfefe;
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
        color: #fdfefe;
        padding: 10px 20px;
      }

      /* Custom styles for the form */
      body {
      background-color: #f8f9fa;
    }

    .form1 {
      background-color: #e6e6fa;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 75px 200px 75px 200px;
    }

    .form-group label {
      color: #333333;
      font-weight: bold;
    }

    .btn-primary {
      background-color: #006699;
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
  </head>
  <body>
    <!-- Navigation -->
    <header class="header">
      <div class="logo">𝐒 𝐓 𝐔 𝐃 𝐘 𝐁 𝐄 𝐄</div>
      <nav class="nav-items">
<a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <a href="register.php" style="font-size: 80%;">
        <i class="fas fa-sign-in-alt"></i> Sign Up</a>
      </nav>
    </header>
    <br />
    <br />
    <div class="container mt-4">
      <h1 class="text-center">Please Login Here:</h1>
      <hr />
  
      <form action="" method="post" class="form1">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input
            type="text"
            name="username"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Enter Username"
          />
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            name="password"
            class="form-control"
            id="exampleInputPassword1"
            placeholder="Enter Password"
          />
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <br />
    <br />


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
