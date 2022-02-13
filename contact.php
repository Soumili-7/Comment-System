<?php

 require 'includes/config.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> CommentSystem</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	
	<link rel="stylesheet" href="web_home/css_home/bootstrap.css"> 
	<link rel="stylesheet" href="web_home/css_home/style.css" type="text/css" media="all" /> 
	<link rel="stylesheet" href="web_home/css_home/fontawesome-all.css"> 
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	
	
</head>

<body style="font-family: 'Times New Roman', serif;">


<div class="inner-page-banner" id="home"> 	   
	
	<header style="background-color: rgb(2, 48, 32)">
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<h1><a class="navbar-brand" href="contact.php" style="font-size:30px">Comment System <span class="display"></span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['email']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>
					</ul>
				</div>
			  
			</nav>
		</div>
	</header>
	</div>
	<div class="container py-0">
	<div class="container">
		<h2 > What would you like to share with the world?  </h2>
			<div class="mail_grid_w3l">
				<form action="contact.php" method="post">
					<div class="row">
						
						<div class="col-md-5 contact_left_grid" data-aos="fade-right">
							<div class="contact-fields-w3ls">
							<textarea name="message" placeholder="Message..." required=""></textarea>
							
							<input type="submit" name="submit" value="Submit">
							</div>
						</div>
					</div>

				</form>
			</div>
		
	</div>
<br><br>
</div>
<!-- //contact -->
<div class="container">

<form method="post">
  <input type="submit" name="button1" value="Filter" style="float:right"/>
</form>
</div>
<?php
   if (isset($_POST['button1'])) {
   	   $mail= $_SESSION['email'];
   	   $query = "SELECT * FROM Comment Where Sender_id = '$mail'";
   	   $result= mysqli_query($conn,$query);
   	   ?>
   	   <div class="container">
   	   <table class="table table-hover">
    	<thead>
      <tr>
        <th>User ID</th>
				<th>Message</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   if(mysqli_num_rows($result)==0){
   	   	  echo '<tr><td colspan="4">No Rows Returned</td></tr>';
   	   }
   	   else{
   	   	  while($row = mysqli_fetch_assoc($result)){
      		
            echo "<tr><td>{$row['sender_id']}</td><td>{$row['message']}</td>";		
			
						echo "</tr>\n";

   	   }
   }
   ?>
   </tbody>
  </table>
</div>
<?php
}
  ?>

<div class="container">
	<h2 class="heading text-capitalize mb-sm-5 mb-4"> Comments Received </h2>
<?php
   //$hostel_id = $_SESSION['hostel_id'];
   $query1 = "SELECT * FROM Comment ORDER BY msg_date, msg_time ASC";
   $result1 = mysqli_query($conn,$query1);
?>
        
  <table class="table table-hover">
    <thead>
      <tr>
		
        <th>User ID</th>
		<th>Message</th>
		
      </tr>
    </thead>
    <tbody>
    <?php
      if(mysqli_num_rows($result1)==0){
         echo '<tr><td colspan="7">No Rows Returned</td></tr>';
      }
      else{
      	while($row1 = mysqli_fetch_assoc($result1)){
      		            
      		echo "<tr><td>{$row1['sender_id']}</td><td>{$row1['message']}</td>";		
			
			echo "</tr>\n";
			
      	}
      }
    ?>
    </tbody>
  </table>
</div>

<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->

	<!-- start-smoth-scrolling -->
	<script src="web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="web_home/js/move-top.js"></script>
	<script type="text/javascript" src="web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
					
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->
	
<!-- //js-scripts -->

</body>
</html>

<?php
if(isset($_POST['submit'])){
	
	$message = $_POST['message'];
	$mail = $_SESSION['email'];

    $today_date =  date("Y-m-d");
    $time = date("h:i A");

	
    $query = "INSERT INTO Comment (sender_id,message,msg_date,msg_time) VALUES ('$mail','$message','$today_date','$time')";
    $result = mysqli_query($conn,$query);
    if($result){
         echo "<script type='text/javascript'>alert('Message sent Successfully!')</script>";
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
   }
  }


?>