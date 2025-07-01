<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDYBEE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');
  
  body {
    margin: 0;
    box-sizing: border-box;
    background-color: rgb(25, 50, 75);
  }

  /* CSS for header */
  .header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #E6E6FA;
}

.header .logo {
  font-size: 40px;
  font-family: 'Franklin Gothic Medium', cursive;
  color: #000000;
  text-decoration: blink;
  margin-left: 30px;
}

.nav-items {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: #E6E6FA;
  scroll-margin-block: 120px;
}

.nav-items a {
  text-decoration: blink;
  font-size: 20px;
  color: #000000;
  padding: 35px 35px;
}

.inline-link {
  color: black;
  font-size: 20px !important; 
  text-decoration: underline !important;
}

.inline-link i {
  margin-right: 5px;
}

.login-register-box {
  border: 1px solid #000; 
  display: inline-block; 
}
.login-register-box a {
  display: block;
  padding: 10px; 
  text-decoration: none; 
  color: #000; 
}


/* Search style */
.searchBox {
  position: relative;
  background: #2f3640;
  height: 60px;
  border-radius: 40px;
  padding: 10px;
}

.searchBox:hover > .searchInput {
  width: 240px;
  padding: 0 6px;
}

.searchBox:hover > .searchButton {
  background: white;
  color: #2f3640;
}

.searchButton {
  color: white;
  float: right;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #2f3640;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.4s;
}

.searchInput {
  border: none;
  background: none;
  outline: none;
  float: left;
  padding: 0;
  color: white;
  font-size: 16px;
  transition: 0.4s;
  line-height: 40px;
  width: 0px;
}

@media screen and (max-width: 620px) {
  .searchBox:hover > .searchInput {
      width: 150px;
      padding: 0 6px;
  }
}

  /* CSS for main body */
      
  .card-img {
    max-height: 100% !important;
    object-fit: cover;
  }
   .card {
      background-color: #d8dee4; 
   }
  
      /* CSS for footer */
      .footer {
        display: flow;
        justify-content: space-between;
        align-items: center;
        background-color: #212121;
        padding: 10px 10px;
      }
  
      
      .bottom-links {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 40px 10;
      }
  
      .bottom-links .links {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10 40px;
      }
  
      .bottom-links .links span {
        font-size: 30px;
        color: rgb(234, 219, 219);
        text-transform: uppercase;
        margin: 10px 0;
      }
  
      .bottom-links .links a {
        text-decoration: none;
        color: rgb(234, 219, 219);
        padding: 10px 20px;
      }
    </style>
  </head>
  
  <body>
    <header class="header">
      <a href="#" class="logo">𝐒 𝐓 𝐔 𝐃 𝐘 𝐁 𝐄 𝐄</a>
      <div class="searchBox">
        <input class="searchInput" type="text" name="" placeholder="Search">
        <button class="searchButton" href="#">
            <i class="material-icons">
                search
            </i>
        </button>
      </div>
      
      <nav class="nav-items">
<a href="index.html">HOME</a>
        <a href="about.html">ABOUT</a>
        <a href="contact.html">CONTACT</a>
        <div class="login-register-box"> <!-- Adding a div container for login and register links -->
          <a href="logout.php" class="inline-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </nav>
    </header>
  <br>
  <br>
  
  
      <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://cdn3d.iconscout.com/3d/free/thumb/free-html-5728485-4781249.png?f=webp" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">HTML</h5>
              <p class="card-text">"HTML is the backbone of the web, providing the structure and content for every webpage."</p>
              <a href="html.html" class="btn btn-primary" style="background-color: black;">DETAILS</a>
              <a href="buy.html" class="btn btn-primary" style="background-color: red;">ENROLL NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://img.freepik.com/free-icon/css_318-698167.jpg" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Cascading Style Sheets (CSS)</h5>
              <p class="card-text">"CSS empowers designers and developers to style and visually enhance web pages, making them aesthetically appealing and user-friendly."</p>
              <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
              <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://logos-world.net/wp-content/uploads/2023/02/JavaScript-Symbol.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">JAVASCRIPT</h5>
                <p class="card-text">"JavaScript is a versatile programming language that enables dynamic and interactive functionality on web pages, bringing them to life with animations, user interactions, and real-time updates."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/C_Programming_Language.svg/1200px-C_Programming_Language.svg.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">C LANGUAGE</h5>
                <p class="card-text">"Learning C opens up the world of programming at a fundamental level, providing a solid foundation to grasp other languages and delve into complex algorithms."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/ISO_C%2B%2B_Logo.svg/1822px-ISO_C%2B%2B_Logo.svg.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">C++</h5>
                <p class="card-text">"C++ is a versatile and object-oriented language, combining the power of C with modern features like classes, inheritance, and polymorphism for efficient and scalable software development."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Hypertext Preprocessor (PHP)</h5>
                <p class="card-text">"PHP is a widely-used server-side scripting language, perfect for web development, with its easy syntax and extensive library of functions for creating dynamic and interactive websites."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://db.cs.uni-tuebingen.de/teaching/ws2223/sql-is-a-programming-language/logo.svg" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Structured Query Language (SQL)</h5>
                <p class="card-text">""SQL, the language of databases, empowers developers to efficiently manage, retrieve, and manipulate data, forming the backbone of modern data-driven applications."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/30/Java_programming_language_logo.svg/800px-Java_programming_language_logo.svg.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; width: 150px;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">JAVA</h5>
                <p class="card-text">
                  "Java, a versatile and object-oriented language, offers a platform-independent approach to development, making it a top choice for building robust and scalable applications."</p>
                  <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                  <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://cdn.icon-icons.com/icons2/2699/PNG/512/python_vertical_logo_icon_168039.png" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">PYTHON</h5>
                <p class="card-text">"Python's powerful imaging libraries like Pillow provide a simple and effective way to manipulate and process images, from resizing to applying filters and beyond."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="https://cdn5.vectorstock.com/i/1000x1000/17/89/artificial-intelligence-logo-and-symbol-vector-31101789.jpg" class="bd-placeholder-img img-fluid rounded-start" style="height: 200px; object-fit: cover;" alt="Programming Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Artificial Intelligence (AI)</h5>
                <p class="card-text">"Artificial Intelligence (AI) drives the future of technology, enabling machines to learn, reason, and adapt, revolutionizing industries and shaping our digital world."</p>
                <a href="#" class="btn btn-primary" style="background-color: black;">DETAILS</a>
                <a href="login.php" class="btn btn-primary" style="background-color: black;">ENROLL NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>

    <footer class="footer">
      <div class="bottom-links">
        <div class="links">
          <span>More Info</span>
          <a href="webpage.html">Home</a>
          <a href="about.html">About</a>
          <a href="contact.html">Contact</a>
        </div>
        <div class="links">
          <span>Social Links</span>
          <a href="https://www.facebook.com/profile.php?id=100004121628822"><i class="fab fa-facebook"></i></a>
          <a href="https://twitter.com/utkarsh2523?t=d6_I2p66xgwvVKfhc9jzGA&s=09"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com/utkarsh__singh_____?igshid=MzNlNGNkZWQ4Mg=="><i class="fab fa-instagram"></i></a>
        </div>
      </div>
  
      <br>
      <div class="copyright-area">
        <div class="copy">
            <div class="row">
                <div class="col-xl-12 col-lg-12 text-center text-lg-center">
                    <div class="copyright-text">
                      <p style="color: white;">Copyright &copy; 2023, All Rights Reserved <a href="https://codepen.io/anupkumar92/" style="color: orange;">Utkarsh</a></p>
                     </body>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  
  </body>
  </html>