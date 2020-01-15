<?php include 'controllers/authController.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style class="box">
		p {
			text-align: center;
			font-size: 140px;
			margin-top: 0px;
		}
	</style>
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
      <div class="col-md-4 offset-md-4 home-wrapper">

        <!-- Display messages -->
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['type'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
        </div>
        <?php endif;?>

        <h4>Thank you for your donation!</h4>
        <a href="login.php" style="color: red;">Login</a>
      </div>
    </div>
	</div>
	
</body>

<footer>
  <div>
    <span style="display: block; margin: 0 auto; font-size: 20px; color: white; text-align: center;">Copyright ©
      <script type="text/javascript">
        document.write(new Date().getFullYear());
      </script>
    NetVR Stream</span>
  </div>
</footer>

</html>