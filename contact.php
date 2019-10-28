<?php include('includes/header.php');?>

  <div id="about" class="view" style="height: 50%;background: url('img/ban.webp')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
    <div class="mask rgba-black-strong">
      <div class="container-fluid d-flex align-items-center justify-content-center h-100">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-md-10">
            <h2 class="text-center text-white h2-responsive px-2 py-3" style="font-family: 'Righteous';line-height: 1.4em"><b>Contact Us</b></h2>
            <hr class="hr-light" style="width: 150px;border:1px solid #fff;">
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Section: Contact-->
<section style="padding: 4em 0em;background: rgba(205, 220, 57, 0.1);" id="contact">

  <section class="container-fluid">
    <div class="row">
      <div class="col-lg-5 col-md-12">
        <div class="card">
          <div class="card-header white-text text-center py-3" style="background: #ccad67;position: absolute;width: 90%;margin-left: 5%;box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.5);margin-top: -2em; border-radius: 5px;">
            <h4 class="h4-responsive text-center">Leave a message</h4>
          </div>
          <!-- Form contact -->
          <form class="p-5 grey-text" method="post" action="email.php">
            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
              <input type="text" id="form3" class="form-control form-control-sm" name="name">
              <label for="form3">Your name</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form2" class="form-control form-control-sm" name="email">
              <label for="form2">Your email</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
              <input type="text" id="form32" class="form-control form-control-sm" name="subject">
              <label for="form34">Subject</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4" name="message"></textarea>
              <label for="form8">Your message</label>
            </div>
            <div class="text-center mt-4">
              <button class="btn btn-md text-white" type="submit" name="submit" style="background: #826931">Send</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-7 col-md-12">
        <div class="row text-center">
          <div class="col-lg-4 col-md-12 mb-3">
            <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>Adarsh Nagar, Mumbai-400102</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-3">
            <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Mon - Sat, 11:00-18:00</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-3">
            <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>+ 91 9619531115</p>
          </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.1870604723904!2d72.82948221485236!3d19.143287387049345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b7bc94eebfc1%3A0x9810a53e4a764df2!2sKhadi%20Premium%20Cosmetics!5e0!3m2!1sen!2sin!4v1571171875105!5m2!1sen!2sin" width="800" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </section>
</section>

<?php include 'includes/footer.php';?>