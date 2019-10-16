
<?php include('includes/header.php');?>

  <div class="text-center container-fluid">
    <?php
      $from = "sksksharma0@gmail.com";
      $to = "sksharma.sharma87@gmail.com";
      $subject = "Email trial";
      $body = "You have a mail, please check!";
      $headers = "From: $from";

      if(mail($to,$subject,$body,$headers)){
        echo "<h2 class='text-success p-3 h2-responsive'>Email sent successfully!</h2>";
      }else{
        echo "<h2 class='text-danger p-3 h2-responsive'>Failure in sending email!</h2>";
      }
    ?>
    
  </div>

<?php include('includes/footer.php');?>