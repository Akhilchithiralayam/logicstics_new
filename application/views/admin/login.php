<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view('admin/files/header');


?>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="<?php echo site_url(); ?>assets/images/logo/logo.png" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
					<form  id="book_op_form" method="post" enctype="multipart/form-data" >
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="user_name" placeholder="E-mail" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button type="submit" class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="<?php echo site_url();?>assets/js/jquery.min.js"></script>
      <script src="<?php echo site_url();?>assets/js/popper.min.js"></script>
      <script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="<?php echo site_url();?>assets/js/animate.js"></script>
      <!-- select country -->
      <script src="<?php echo site_url();?>assets/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="<?php echo site_url();?>assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
     <!-- <script src="<?php echo site_url();?>assets/js/custom.js"></script>-->
	 <script type="text/javascript">

$('form#book_op_form').submit(function(e) {
                                  

var form = $(this);

 e.preventDefault();
      //alert('as');
     //book_op_form
     
 $.ajax({
     type: "POST",
     url: "<?php echo site_url('Login/login'); ?>",
    data:  new FormData(this),
         mimeType:"multipart/form-data",
         contentType: false,
         cache: false,
         processData:false,
         dataType : 'json',

     success: function(data){
                              if (data.error == false) { 
                                 
                                                       if (data.role == "super_admin") { 
     
                     window.location.href = "<?php echo site_url(); ?>Admin/dashboard/";
													   }
                 }
                 else
                 {
                   alert('Incorrect User Name or password');
					

                 }


     }

});
      
     

   });
   
   
  
   
   </script>
   </body>
</html>