<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include_once("idgen.php");
}

$f = "visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}
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
<!--				<div id="clockdate">-->
<!--					<div class="clockdate-wrapper">-->
<!--						<div id="clock"></div>-->
<!--						<div id="date">--><?php //echo date('l, F j, Y'); ?><!--</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="pagevisit">-->
<!--					<div class="visitcount">-->
<!--						--><?php
//						$handle = fopen($f, "r");
//						$counter = ( int ) fread ($handle,20) ;
//						fclose ($handle) ;
//
//						if($_SERVER['REQUEST_METHOD'] != 'POST'){
//							$counter++ ;
//						}
//
//						echo "This Page is Visited ".$counter." Times";
//						$handle =  fopen($f, "w" ) ;
//						fwrite($handle,$counter) ;
//						fclose ($handle) ;
//						?>
<!--					</div>-->
<!--				</div>-->
			</nav>
			<div class="topmost container" style="margin-top:8em;">
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<strong class="panelinputtitle">Upload Your Picture Here</strong>
							</center>
						</div>
						<div class="panel-body" style="min-height:220px;">
							<div class="container-fluid">
								<form method = "post" enctype="multipart/form-data" id="uploadForm">
									<div class = "form-group">
										<input type = "text" class = "form-control" placeholder="Your Name" name="visitornewm" value="<?php echo @$_POST['visitornewm']; ?>">
									</div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="">Upload Your Picture</label>-->
<!--                                        <b></b> <input type="file" name="dp-pix" required value="--><?php //echo @$_POST['dpix']; ?><!--">-->
<!--                                    </div>-->

                                    <div class="form-group">
                                        <label for="">Upload Your Picture (in square dimension)</label>
                                        <b></b> <input type="file" name="dpix" required value="<?php echo @$_POST['dpix']; ?>">
                                    </div>

									<div class = "form-group">
										<input type = "submit" class = "btn btn-primary btn-block" name="process" value="Generate ID">
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<strong class="panelinputtitle">Generate DP</strong>
							</center>
						</div>
						<div class="panel-body" style="min-height:230px;">
							<center>
								<?php
								if($_SERVER['REQUEST_METHOD'] == 'POST'){
									echo '<img src="'.$img2.'">';
								}else{
									echo "<img src='img/dp-custom-rez.png' alt='' class='resultimg' />";
								}
								?>
								
								<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo @str_replace(" ","",strtolower($text)); ?>.png ">Download DP</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</body>	
</html>