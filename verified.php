<?php include 'controllers/authController.php'?>
<?php
// redirect user to landing page if they're not logged in

if (empty($_SESSION['ID'])) {
    header('location: landing.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <title>NetVR Stream</title>

  <style type="text/css">
    div.box {
      text-align: center;
    }
  </style>

<style>

/*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-default,
.btn-default:hover,
.btn-default:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritence from `body` */
  background-color: #fff;
  border: 1px solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
}
body {
  color: #fff;
  text-align: center;
  text-shadow: 0 1px 3px rgba(0,0,0,.5);
}

/* Extra markup and styles for table-esque vertical and horizontal centering */
.site-wrapper {
  display: table;
  width: 100%;
  height: 100px;
  background-color: #333;
  /*height: 100%; */
  /*min-height: 100%;*/
}
.site-wrapper-inner {
  display: table-cell;
  vertical-align: top;
}
.cover-container {
  margin-right: auto;
  margin-left: auto;
}

/* Padding for spacing */
.inner {
  padding: 30px;
}


/*
 * Header
 */
.masthead-brand {
  margin-bottom: 10px;
}

.masthead-nav > li {
  display: inline-block;
}
.masthead-nav > li + li {
  margin-left: 20px;
}
.masthead-nav > li > a {
  padding-right: 0;
  padding-left: 0;
  font-size: 16px;
  font-weight: bold;
  color: #fff; /* IE8 proofing */
  color: rgba(255,255,255,.75);
  border-bottom: 2px solid transparent;
}
.masthead-nav > li > a:hover,
.masthead-nav > li > a:focus {
  background-color: transparent;
  border-bottom-color: #a9a9a9;
  border-bottom-color: rgba(255,255,255,.25);
}
.masthead-nav > .active > a,
.masthead-nav > .active > a:hover,
.masthead-nav > .active > a:focus {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 768px) {
  .masthead-brand {
    float: left;
  }
  .masthead-nav {
    float: right;
  }
}

/*
 * Affix and center
 */

@media (min-width: 768px) {
  /* Start the vertical centering */
  .site-wrapper-inner {
    vertical-align: middle;
  }

}

</style>

<script>
  
  $(document).ready(function() {
  
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
      $(".file-upload").click();
    });
  });

</script>

<style>
body {
  margin: 0;
}

.header {
  padding: 10px 16px;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 90%;
}

.sticky + .content {
  padding-top: 102px;
}

.modal {
  background: transparent;
  float: left;
}

</style>

<div class="container">

  <!-- Modal -->
  <div class="modal fade" style="padding-top: 10%;" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border:5px solid rgb(51, 153, 255);;">
        <div class="modal-header">
          <h4 class="modal-title text-center" style="font-size: 30px; text-align: center;">Account Settings</h4>
        </div>
        <div class="modal-body">
          <form action="verified.php" method="post">
            
            <h3><div class="avatar-wrapper">
              <div><label class="text-center" style="color: rgb(51, 153, 255);">Avatar</label></div>
              <img class="profile-pic" src="" />
              <div class="upload-button">
                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
              </div>
              <input class="file-upload" type="file" accept="image/*"/>
            </div>

            <div class="form-group">
              <div><label style="color: rgb(51, 153, 255);">Email</label></div>
              <div><label style="color: white;"><?php echo $_SESSION['email'] ?></label></div>
            </div>
            <div class="form-group">
              <div><label style="color: rgb(51, 153, 255);">Player Name</label></div>
              <div><label style="color: white;"><?php echo $_SESSION['playerName'] ?></label></div>
            </div>
            <div class="form-group">
              <div><label style="color: rgb(51, 153, 255);">Stream Key</label></div>
              <div><label style="color: white;"><?php echo $_SESSION['streamKey'] ?></label></div>
            </div></h3>

          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" data-dismiss="modal"  name="avatar-btn">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="header" id="myHeader">
  <div>
  <div>
    <div>
      <div>
        <div>
          <div><img src="netvrstream.png" width="200" height="auto" align="left" alt="netvr" class="masthead-brand"></div>
          <div class = "navbar-nav mr-auto">
            <div class = "navbar-nav mr-auto">
              <div>
                
                <?php if ($_SESSION['status']): ?>
                  <div>
                  <h4><?php echo $_SESSION['playerName']; ?></h4>
                  </div>
                <?php else: ?>
                <?php endif;?>
              </div>
            </div>
          </div>
          <nav>
            <ul class="nav masthead-nav">
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style= "background-color: rgb(51, 153, 255);">Account Settings</button>
              <a href="logout.php"><button type="button" class="btn btn-info btn-lg" style= "background-color: rgb(51, 153, 255);">Logout</button></a>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  }
}
</script>


</head>

<body style=" margin:5%;">

  <!-- <div class="mistvideo" id="netvrstream_8a0Bbg3sZVX0">
    <noscript>
      <a href="http://192.168.254.105:8080/netvrstream.html" target="_blank">
        Click here to play this video
      </a>
    </noscript>
    <script>
      var a = function(){
        mistPlay("netvrstream",{
          target: document.getElementById("netvrstream_8a0Bbg3sZVX0")
        });
      };
      if (!window.mistplayers) {
        var p = document.createElement("script");
        p.src = "http://192.168.254.105:8080/player.js"
        document.head.appendChild(p);
        p.onload = a;
      }
      else { a(); }
    </script>
  </div> -->

  <div class="box">
    <p style="font-size: 10vw;">COMING SOON</p>
  </div>

	<div class="box">
		<video width="70%" height="auto" controls autoplay muted>
		<source src="alpha.mp4" type="video/mp4">
		Your browser does not support the video tag.
		</video>
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

  <div>
    <span style="display: block; margin: 0 auto; font-size: 20px; color: white; text-align: center;">Copyright ©
      <script type="text/javascript">
        document.write(new Date().getFullYear());
      </script>
    NetVR Stream</span>
  </div>
</footer>

</html>