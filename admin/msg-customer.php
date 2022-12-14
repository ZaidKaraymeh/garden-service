<?php

//Include functions
require('includes/header.php');

include('includes/functions.php');

$id = $_GET['cid'];

?>


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <?php //Collect the admin's name and put it in there using the session super global?> Admin Name | You are Admin
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-envelope"></i> <a href="reports.php?cus_id=<?php echo $id; ?> ">View Report</a>  
                            </li>
                            <small class="pull-right"><a href="customers.php"> View Customers </a> </small>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

  <div class="row">
        
      <div class="col-md-8 col-md-offset-2" >
               
                    <section id="contact" class="grey_section" style="padding:20px; border: 1px solid #ddd;">   
                         <div class="row">
                            <div class="widget widget_contact col-sm-3 to_animate" >
                               <p><strong>Customer Information</strong></p><br>
                               
                                <?php
                                
                                
                                /************** Get the value from database using id ******************/  
          
      

                                    //require database class files
                                    require('includes/config.php');


                                    //instatiating our database objects
                                    $db = new config;


                                    $db->query('SELECT * FROM users WHERE id=:id');
                                
                                    $db->bindValue(':id', $id, PDO::PARAM_INT);

                                    $row = $db->fetchSingle();

                                
                                   if($row) :
        
                                   
                                          
                                      ?>

                    <p style="background-color: #fff; padding: 3px">
                        <strong>Name: </strong>
                        <?php echo $row['full_name'] ?>
                    </p>
                    <hr>

                    <p style="background-color: #fff; padding: 3px">
                        <strong>Spending Amount: </strong>$
                        <?php echo $row['spending'] ?>
                    </p>
                    <hr>
                    <p style="background-color: #fff; padding: 3px">
                        <strong>Email: </strong>
                        <?php echo $row['email'] ?>
                    </p>
                    <hr>


            </div>

            <div class="col-sm-3">
                <p><strong></strong></p><br><br>


                <p>
                    <strong></strong>
                </p><br><br>

                <p class="pull-right">

                </p><br><br>
                <p class="pull-right">

                </p><br>


            </div>


            <div class="col-sm-6">

                <form class="form-horizontal" role="form" method="post"
                    action="msg-customer.php?cid=<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label for="name">Subject <span class="required">*</span></label>
                        <input type="text" aria-required="true" size="30" value="" name="subject" id="name"
                            class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" aria-required="true" size="30" value="<?php echo $row['email'] ?>"
                            name="email" id="email" class="form-control" placeholder="<?php echo $row['email'] ?>"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea aria-required="true" rows="8" cols="45" name="message" id="message"
                            class="form-control" placeholder="Type Message Here"></textarea>
                    </div>

                    <div class="form-group">
                        <!-- <input type="submit" value="Send" id="contact_form_submit" name="contact_submit" class="theme_button"> -->
                        <button type="submit" id="contact_form_submit" name="customer_submit"
                            class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>


            <?php endif ; ?>
        </div><!--row-->
        </section>


        <!--******************************* Contact Customer  Form Processor*****************************-->

        <?php 
               //Write a function to check if form is submited
          
                    if(isset($_POST['customer_submit'])){


                        //Get id
                        $id = $_GET['cid'];
                       

                        $db->query('SELECT * FROM users WHERE id=:id');
                                
                        $db->bindValue(':id', $id, PDO::PARAM_INT);

                        $row = $db->fetchSingle();

                        if($row)
                        
                        {
                        
                        $customer_fullname = $row['full_name'];
                            
                        $raw_subject     =   cleandata($_POST['subject']);
                        
                        $raw_msg         =   cleandata($_POST['message']);

                        $c_subject       =   sanitize($raw_subject);
                            
                        $c_msg           =   sanitize($raw_msg);
             

                        // Create the email and send the message
                        $to            =   $row['email'];        
                        $email_subject = "Subject:  $c_subject";
                        $email_body = "\nDear $customer_fullname, \n\nThis is a message from Cus MangerApp.Com.\n\n"."Here are the details:" ."\n\n$c_msg \n\n";
                        $headers = "From: noreply@customerapp.com"; 
         
                        if(mail($to,$email_subject,$email_body,$headers)){
                            
                       
                           echo "<div class='alert alert-success text-center'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  <strong>Success!</strong> Your Message has been successfully sent.<a href='customers.php'> Back to Customers</a>
                                 </div>";
                            }else{
                           
                            
                            echo "<div class='alert alert-danger text-center'>
                                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                  <strong>Sorry!</strong> Your Message could not be Processed, Please Try Again <a href='customers.php'> Back to Customers</a>
                                 </div>";
                            
                        }
                        
                         return true;
                                         
                        }
 
                    }
          
?>
    </div><!--col 8 -->
</div><!--row -->

<br><br><br><br>

</div> <!--Container Fluid -->
</div><!--Page Wrapper -->