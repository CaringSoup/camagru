<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru - Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="js/myFunctions.js"></script>
</head>
<body>
    <!-- Header -->
    <?php include("includes/header.component.php"); ?>
    <!-- Container -->
    <?php include("includes/update.component.php"); ?>
	<?php include("includes/user.component.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("includes/menu.component.php"); ?>
            <div class="col-md-10" style="background: azure;">
				<?php if ($_GET['page'] == 'Gallery') { include("modal/gallery.php"); include("thumbs_up.php"); include("delete.php"); } ?>
				<?php if ($_GET['page'] == 'Camera') { include("modal/Camera.php"); } ?>
				<?php if ($_GET['page'] == 'Profile') { include("modal/profile.php"); } ?>
            </div>
        </div>
    </div>
</div>
    <!-- Footer -->
    <?php include_once("includes/footer.component.php"); ?>
</body>
</html>