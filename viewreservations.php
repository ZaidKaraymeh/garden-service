<?php
session_start();
require('authorization.php');
if(isset($_SESSION['admin'])){
  require('adminheader.php');
  $username=$_SESSION['admin'];
}else
{  require('header2.php');
  $username=$_SESSION['activeuser'];
}





        //view all reservation
        //add comment+rate

        date_default_timezone_set("Asia/Bahrain"); //change server time to bahrain time
      try{
          require('connection.php');
          $rs = $db->query("select * from users where username ='$user' ");
          $s=$db->query("SELECT * FROM comments  WHERE username = '$user' ");
         
          while ($rr = $rs->fetch()) {
                $uid=$rr['id'];
            }
          $r = $db->query("select * from reservation where uid= $uid");
          $c=0;
         while ($row = $r->fetch()) {
                $aid[]=$row['aid'];
                $date[]=$row['date'];
                $time[]=$row['time'];
                $aname[]=$row['aName'];
                $rid[]=$row['rid'];
                $price[]=$row['price'];
               ++$c;
            }
            while ($ss = $s->fetch()) {
                $caid[]=$ss['aid'];
                $crid[]=$ss['rid'];
                if(!is_null($ss['rate'])){
                    $crate[]=100;   //if null add 100 if not add the rate value which is between  1 to 5
                  }else $crate[]=$ss['rate']; 
          }

         
        /*    
         foreach($aid as $k){
            $s= $db->query("select * from activity where id= $v");
            while ($row = $s->fetch()) {
                $aname[]=$row['name'];
         }
          
          if($r->rowCount()>0){
            
          }else{$msg='no reservation yet';
            
          }
*/

          $db = null;
      }
      catch(PDOException $ex)
      {
          echo "Error occured";
          die($ex->getMessage());
      
      }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Beachna</title>

    <style>
        .main{
            margin-left:auto;
            margin-right:auto;
	       width: 80%;
           height: auto;
        }
        .card-title{
             text-align:center;
             font-family:arial;
             font-style:bold;
             letter-spacing:5px;
            
        }
        .card-text{
            font-family:arial;
             font-style:bold;
             letter-spacing:2px;
             font-size:20px;
        }
        .d p{
          border:3px solid #17a2b9;
          border-radius:10px 10px 10px 10px;
          width: 70px;
          display:inline-block;
          color:white;
          background:#17a2b9;
        }
        .d p:hover{
          border:3px solid #17a2b9;
          border-radius:10px 10px 10px 10px;
          width: 70px;
          display:inline-block;
          background:white;
           color:#17a2b9;
        }
        .d a{
          text-decoration:none;
        }

        

    </style>
    </head>
    <body>
      <div class="main">
        <?php
          if($c==0){  echo " <h3 class='card-title'> No Reservations Yet</h3>";}
          else{
         foreach($aid as $k=>$v){
          
          //check if the reservation passed or not //true passed 
            $tt=0;
            //echo date("Y-m-j");
            //echo $date[$k];
            //echo date("g:ia");
            //echo $c;
            if ($date[$k]==date("Y-m-j")){
                 $t=explode("-",$time[$k]);
                 $now=date("g:ia");
                 
                  if(strtotime($t[1])<=strtotime($now)){
                     $tt++;
                     
                     
                  }     
                  
            }else if($date[$k]<date("Y-m-j")){
                  $tt++;
            }

             
                   
        
          if($tt!=0){
            //check if the user can rate or not
          $rt=0; //0 can rate
          //all user reservations
          //echo "t0";
          foreach($caid as $e=>$b){ //all user comments
            //echo "t00";
              if ($v==$b){  //aid==aid.comments 
                //echo "t1";
                if($crid[$e]==$rid[$k]){  //rid==rid.comments
                //echo "t2";
                  if($crate[$e]==100){ 
                    $rt++; //user can't rate
                    //echo "t3";
                  }
                }
              }    
            }
        }
            
          
            ?>
            <div class="card mt-2  text-center">
                 <div class="card-header">
                 <h3 class="card-title"><?php echo $aname[$k];?> </h3>
                 </div>
                   <div class="card-body">
                        <p class="card-text">date:<?php echo $date[$k];?> <br>time:<?php echo $time[$k];?><br>price:<?php echo $price[$k];?>BD</p>
                          <?php if($tt!=0){   //passed activity?> 
                           <div class="container ">
                            <div class="row ">
                                <?php if($rt==0){  //user can rate  ?>
                               <div class="col-6">
                                    <p class="card-text">Rate Your Experience</p>
                                    <form method='POST' action="addrate.php" > 
                                    <input type="number" class="form-control" name="rate" id="rate" min=1 max=5>
                                    <input type='hidden' name='aid' value='<?php echo $aid[$k];?>'/><!--hidden btn for aid -->
                                    <input type='hidden' name='rid' value='<?php echo $rid[$k];?>'/> <!--hidden btn for rid -->
                                    <input type="submit"  name="b1" class="btn btn-info btn-sm " value="RATE" id="b1"> 
                                    </form>
                                    </div>
                                   <?php } ?>
                                <div class="col-6 ">
                                  <p class="card-text">Add Comment</p>
                                  <form method='POST' action="addcomment.php" >
                                  <input type="text" class="form-control" name="comment" id="comment">
                                  <input type='hidden' name='aid' value='<?php echo $aid[$k];?>'/> <!--hidden btn for aid -->
                                  <input type='hidden' name='rid' value='<?php echo $rid[$k];?>'/> <!--hidden btn for rid -->
                                  <input type="submit" name="b2" class="btn btn-info btn-sm " value="ADD"> 
                                  </form>
                                  </div>
                            <row> <!--row-->
                          </div> <!--container-->
                     
                         <?php }?>
                   </div>
                      <div class="card-footer text-muted">
                      <?php if($tt!=0){
                        echo "<p style='color:green'>PREVIOUS ACTIVITY</p>"; 
                       }else echo "<p style='color:red'>UPCOMING</p>";  ?>
                      <a href="details.php?uid=<?php echo $uid; ?>?aid=<?php echo $aid[$k]; ?>?rid=<?php echo $rid[$k];?>">
                      <div class="d"><p >details</p></div>
                      </a>
                      </div>
            </div>

        <?php } //if c ?> 
    
         </div>
         <?php } //outer loop?>
         <script>
            function disable(){ 
                document.getElementById('b1').disabled=true;
            }
        </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
       <?php require('footer.php'); ?>