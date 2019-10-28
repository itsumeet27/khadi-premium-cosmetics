
<?php include('includes/header.php');?>

  <div class="text-center container-fluid">
    <?php
      if(isset($_POST['submit'])){
        $ip = getIp();
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $subject = sanitize($_POST['subject']);
        $message = sanitize($_POST['message']);
      }
      //The code below does not work on localhost but does work on your domain server
      $from = "itsumeet@gmail.com";
      $to = $email;
      $subject = $subject;
      $body = "Hello $name! Thanks for the enquiry. We will get back to you soon";
      $headers = "From: $from";
            

      if(mail($to,$subject,$body,$headers)){
        echo "<h2 class='text-success p-3 h2-responsive'>Email sent successfully!</h2>";
      }else{
        echo "<h2 class='text-danger p-3 h2-responsive'>Failure in sending email!</h2>";
      }
    ?>
    
  </div>

<?php include('includes/footer.php');?>