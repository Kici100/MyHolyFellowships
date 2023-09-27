<?php
include("classes/connect.php");
include("classes/Signup.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if (!empty($result)) {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
        echo $result;
        echo "</div>";
    } else {
        header("Location: login.php");
        exit;
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
}
?>
<html>
<head>
    <title>HolyFellowships | Sign Up</title>
</head>
<body style="font-family: tahoma; background-image:url('bhf2.gif'); background-repeat:repeat;background-size: 106%;">

    	<div style="height:150px;background-color: blueviolet;color: white; padding: px">
    	 <div style="font-size: 40px;">HolyFellowships</div>
         <div id="signup_button">Log in</div>
        
        </div>
   <style>
    #signup_button{

      background-color: green; 
      width: 70px;
      text-align: center ; 
      padding: 4px ;
      border-radius: 10px;
      float: right;
    }
    .imgMain { font-size: 40px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top: -150px;
    }
    #lBar2{
        background-color:teal;
        width:800px;
        height:;
         margin:auto;
         margin-bottom:20px;
         position: relative;
        top: -90px;
        padding: 10px;
        padding-top: 50px;
        text-align: center;
    }

    #text{
        height: 40px;
        width:300px;
        border-radius:4px ;
        border:solid 1px greenyellow ;
    }
    #button{
        width: 300px;
        height: 40px;
        border-radius: 4px;
        font-weight: bold;border: none;
        background-color: blueviolet;
        color: white;
    }
   </style>
    <img src="Banner.png" alt="web banner" width="300" 
     height="150" class="imgMain">
     
     <div id="lbar2">
        Sign up to HolyFellowships<br><br>
          
          <form method="post" action="">

          <input value="<?php  $first_name ?>" name="first_name" type="text" id="text" placeholder="first name"><br><br>
          <input value="<?php  $last_name ?>" name="last_name" type="text" id="text" placeholder="last name"><br><br>
       
          
          <span style="font-weight: normal;">Gender:</span> <br>
          <select  id="text" name="gender">
         
          <option>
           <?php echo $gender?>
          </option>
          
          <option>
           Male
          </option>
        
          <option>
           Female
          </option>

          </select>
          <br><br>
          <input value="<?php  $email ?>"  name="email" type="email" id="text" placeholder="email"><br><br> 
          <input name="password" type="password" id="text" placeholder="Password"><br><br> 
          <input name="password2" type="password" id="text" placeholder="Re-enter Password"><br><br>
          <input type="submit"id="button" value="Sign up"><br><br>
        </form>
     </div>
    </body>
 
</html> 
