<!DOCTYPE html>
<html lang="en">

<head>
    <title>CommentSystem</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
   
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    

</head>


<body style="background: url(web/images/h.jpg) ;font-family: 'Times New Roman', serif;">
    <h1>Comment System</h1>
    <div class=" w3l-login-form">
        <h2>Sign Up Here</h2>
        <form action="includes/signup.inc.php" method="POST">         
            
            <div class=" w3l-form-group">
                <label>Email</label>
                <div class="group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" name="mail" placeholder="Email" required="required" />
                </div>
            </div>
            
            <div class=" w3l-form-group">
                <label>Password</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Secret</label>
                <div class="group">
                    <i class="fas fa-user-secret"></i>
                    <input type="text" class="form-control" name="sec" placeholder="Secret" required="required" />
                </div>
            </div>
            
            
            <button type="submit" name="signup-submit">Sign Up</button>
        </form>
        <p class=" w3l-register-p">Already a member?<a href="index.php" class="register"> Login</a></p>
    </div>
    

</body>

</html>
