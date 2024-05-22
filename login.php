<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style_login.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
  <title>Login</title>
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
                <form action="login_db.php" method="POST">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>

                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <div class="row">

                      <di class="col-4">
                        <label class="" for="for3Examole3c">Type:</label>
                      </di>

                      <div class="col-4">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="user" checked />
                        <label class="form-check-label" for="inlineRadio1">User</label>
                      </div>

                      <div class="col-4">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="admin" />
                        <label class="form-check-label" for="inlineRadio2">Admin</label>
                      </div>
                    </div>
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-4 ">
                    <input type="email" id="typeEmailX" class="form-control form-control-lg " name="user" required />
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="passwd" required />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
                </form>


              </div>

              <div>
                <p class="mb-0">Don't have an account? <a href="http://localhost/Library/register.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>