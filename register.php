<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>


                  <form class="mx-1 mx-md-4" action="register_db.php" method="POST">

                    <?php if (isset($_SESSION['success'])) { ?>
                      <script>
                        alert("<?php echo $_SESSION['success']; ?>");
                      </script>
                      <?php unset($_SESSION['success']); ?>
                    <?php } ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                      <script>
                        alert("<?php echo $_SESSION['error']; ?>");
                      </script>
                      <?php unset($_SESSION['error']); ?>
                    <?php } ?>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" required name="firstname" />
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" class="form-control" required name="lastname" />
                        <label class="form-label" for="form3Example3c">Your LastName</label>
                      </div>
                    </div>


                    <div class="form-check-inline">
                      <h6<i class="fa-solid fa-venus-double"></i></h6>

                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" checked />
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" />
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4 mt-3">

                      <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example4c" class="form-control" required name="phone" />
                        <label class="form-label" for="form3Example4c">Phone</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">

                      <i class="fa-solid fa-address-card fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example4cd" class="form-control" required name="cardno" />
                        <label class="form-label" for="form3Example4cd">CardNo</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="Email" id="form3Example4cd" class="form-control" required name="email" />
                        <label class="form-label" for="form3Example4cd">Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="password" id="myPassword" class="form-control" required name="pass" />
                        <label class="form-label" for="form3Example4cd">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="showPassword()">
                        <label class="form-check-label" for="flexCheckDefault">
                          Show password
                        </label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="https://3.bp.blogspot.com/-IWM0_Rp9GLc/W3wtaA1MQJI/AAAAAAAAHYY/gTuPl8DeEmYfaHOLcluA2mgsPrZp82NywCLcBGAs/w1200-h630-p-k-no-nu/Library.png" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

</body>

</html>
<script>
  function showPassword() {
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
      x.type = "text"

    } else {
      x.type = "password"
    }
  }
</script>