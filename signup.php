<?php include 'controllers/authController.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>NetVR Stream</title>

  <style type="text/css">
    div.box {
      text-align: center;
    }
  </style>

</head>
<body style=" margin:5%;">

<div class="box">
  <img src="netvrstream.png" alt="netvr">
</div>

  <div class="statement">
    Bridging the Difference 
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth">
        <h3 class="text-center form-title">Register</h3>
        <form action="signup.php" method="post">
          
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $email; ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password Confirm</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Player Name</label>
            <input type="text" name="playerName" class="form-control form-control-lg" value="<?php echo $playerName; ?>">
          </div>
          <div class="form-group">
            <button type="submit" name="signup-btn" class="btn btn-lg btn-block">Sign Up</button>
          </div>

        </form>

        <!-- form title -->
        <h3 class="text-center form-title">Register</h3> <!-- or Login -->

        <?php if (count($errors) > 0): ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
            <li>
              <?php echo $error; ?>
            </li>
            <?php endforeach;?>
          </div>
        <?php endif;?>

        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>

  <div>
    <p></p>
  </div>

</body>

<footer>

  <div>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_s-xclick" />
    <input type="hidden" name="hosted_button_id" value="YMQQZ5EWVDEF4" />
    <input style="display: block; margin: 0 auto;" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
    </form>
  </div>

  <div class="copyright">
    <span style="display: block; margin: 0 auto; font-size: 20px; color: white; text-align: center;">Copyright ©
      <script type="text/javascript">
        document.write(new Date().getFullYear());
      </script>
    NetVR Stream</span>
  </div>
</footer>

</html>