<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>
<body>

<section class=" gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="" method="post">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter your details!</p>

              <div class="form-outline form-white mb-4">
                <input name="name" type="text" id="typeEmailX" class="form-control form-control-lg" placeholder="Name" />
                <label class="form-label" for="typeEmailX">Name</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input name="email" type="email" id="typeEmailX" class="form-control form-control-lg"  placeholder="Email"/>
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input name="phone" type="tel" maxlength="10" id="typeEmailX" class="form-control form-control-lg" placeholder="Phone number" />
                <label class="form-label" for="typeEmailX">Phone</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input name="address" type="text" id="typeEmailX" class="form-control form-control-lg" placeholder="Present Address" />
                <label class="form-label" for="typeEmailX">Address</label>
              </div>


              <button name="register" class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>


              </form>
            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="./index.php" class="text-white-50 fw-bold">Login</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

              <style>
                  .gradient-custom {
  /* fallback for old browsers */
  background: #6a11cb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
              </style>
    

<?php

$link=new mysqli("localhost","root","","poultry_farm");

if(isset($_POST['register'])){
    
    $sql= mysqli_query($link,"INSERT INTO `customer`(`c_name`, `password`, `email`, `phone_no`, `address`) 
    VALUES('$_POST[name]','$_POST[password]','$_POST[email]','$_POST[phone]','$_POST[address]')");
    ?>
    <script>
        window.location.href='index.php';
    </script>    
    <?php
}


?>
</body>
</html>