
<?php
include 'upload.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Friesland is 150!</title>
		<link href="img/favicon.png" rel="icon" type="image">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!--		<link rel="stylesheet" href="css/datepicker.css">-->
		<link rel="stylesheet" href="css/style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--		<script src="js/datepicker.js"></script>-->
		<script src="js/navbarclock.js"></script>
    </head>
		<body onload="startTime()">
			<nav class="navbar-inverse" role="navigation" style="background-color: white; border-bottom: 1px solid #edeceb;
height: auto;">
					<img src="img/logo.png" class="hederimg">
			</nav>
			<div class="topmost container" style="margin-top:8em;">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<strong class="panelinputtitle">Upload Your Picture Here</strong>
							</center>
						</div>
						<div class="panel-body" style="min-height:220px;">
							<div class="container-fluid">

                                <?php if(!empty($statusMsg)) { ?>
                                <p><?php echo $statusMsg; ?></p>
                                <?php } ?>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="">Upload Your Picture (Best size - 344 * 360)</label>
                                        <input type="file" name="file" required">
                                    </div>

									<div class = "form-group">
										<input type = "submit" class = "btn btn-primary btn-block" name="submit" value="Preview">
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<strong class="panelinputtitle">Generate DP</strong>
							</center>
						</div>
						<div class="panel-body" style="min-height:230px;">
							<center>
								<?php
								//display the pix here
                                include 'display.php';
								?>
								
								<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $finImageURL; ?>">Download DP</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</body>	
</html>