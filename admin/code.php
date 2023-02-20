<?php

include 'security.php';




    /* Admin Login */

    if(isset($_POST['login']))
    {

        $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
        $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
        $query = "SELECT * FROM admin WHERE email = '$name' OR name = '$name'";
        $query_run = mysqli_query($connection,$query);
        $count = mysqli_num_rows($query_run);
    

        if($count > 0)
        { 
            $row = mysqli_fetch_assoc($query_run);
            if(password_verify($pass,$row['password']))
            {

                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['admin_name'] = $row['name'];
                    header('Location: index.php');

            }
            else{

                $_SESSION['status'] = "Incorrect Credentials Please Check Once Again";
                header('Location: login.php');
            }
        }
        else{
            $_SESSION['status'] = "Admin Account Doesn't Exists";
            header('Location: login.php');
        }

    }



    /*Admin Logout */

    if(isset($_POST['logout']))
    {

        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location: login.php');
    }





 
    /*Add Incharge*/

    if(isset($_POST['add_incharge']))
    {
    
        $token = '1234123213214123209700332412324123212454654521275311421232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $id = substr($token, 0, 5);


            $name = $_POST['name'];
            $image = $_POST['image'];
            $qualification = $_POST['qualification'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];

         
            date_default_timezone_set('Asia/Kolkata');
            $created_at = date('d-m-Y');

            $query = "INSERT INTO incharge (id,name,image,email,mobile,qualification,created_at) VALUES ('$id','$name','$image','$email','$mobile','$qualification','$created_at')";
            $query_run = mysqli_query($connection,$query);

        

            if($query_run)
            {
                $_SESSION['success'] = "New Incharge Added Successfully";
                header('Location: incharges.php');
            }
            else
            {
                $_SESSION['status'] = "Failed To Add New Incharge";
                header('Location: incharges.php');
            }




    }








  /*Update Incharge */

  if(isset($_POST['update_incharge']))
  {
  
            $id = $_POST['update_inchargeid'];     
     

            $name = $_POST['name'];
            $image = $_POST['image'];
            $qualification = $_POST['qualification'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
         
      $query = "UPDATE incharge SET name = '$name',image='$image',email ='$email',mobile ='$mobile',qualification='$qualification' WHERE id = '$id'";
      $query_run = mysqli_query($connection,$query);
                                                              
      if($query_run)
      {
              $_SESSION['success'] = "Incharge Updated Successfully";
              header('Location:incharges.php');
      }
      else
      {
          $_SESSION['status'] = "Failed To Update Incharge";
          header('Location:incharges.php');
      }


  }


  /* Delete  Incharge */

  if(isset($_POST['delete_incharge']))
  {
                                                                                   
          $id = $_POST['delete_inchargeid'];                                                                       
          $query = "DELETE FROM incharge WHERE id='$id' ";
          $query_run = mysqli_query($connection,$query);
                                                           
          if($query_run)
          {
                  $_SESSION['success'] = "Incharge Deleted Successfully... :)";
                  header('Location:  incharges.php');
          }
          else
          {
                  $_SESSION['status'] = "Incharge Not Deleted ? Try Again....";
                  header('Location:   incharges.php');
          }
                                                                                              
  }  
















 
    /*Add mentor*/

    if(isset($_POST['add_mentor']))
    {
    
        $token = '1234123213214123209700332412324123212454654521275311421232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $id = substr($token, 0, 5);


            $name = $_POST['name'];
            $image = $_POST['image'];
            $qualification = $_POST['qualification'];
            $accomplishments = $_POST['accomplishments'];
            $experience = $_POST['experience'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];

         
            date_default_timezone_set('Asia/Kolkata');
            $created_at = date('d-m-Y');

            $query = "INSERT INTO mentor (id,name,image,email,mobile,qualification,accomplishments,experience,created_at) VALUES ('$id','$name','$image','$email','$mobile','$qualification','$accomplishments','$experience','$created_at')";
            $query_run = mysqli_query($connection,$query);

        

            if($query_run)
            {
                $_SESSION['success'] = "New mentor Added Successfully";
                header('Location: mentors.php');
            }
            else
            {
                $_SESSION['status'] = "Failed To Add New mentor";
                header('Location: mentors.php');
            }




    }








  /*Update mentor */

  if(isset($_POST['update_mentor']))
  {
  
            $id = $_POST['update_mentorid'];     
     

            $name = $_POST['name'];
            $image = $_POST['image'];
            $qualification = $_POST['qualification'];
            $accomplishments = $_POST['accomplishments'];
            $experience = $_POST['experience'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
         
      $query = "UPDATE mentor SET name = '$name',image='$image',email ='$email',mobile ='$mobile',qualification='$qualification',accomplishments='$accomplishments',experience='$experience' WHERE id = '$id'";
      $query_run = mysqli_query($connection,$query);
                                                              
      if($query_run)
      {
              $_SESSION['success'] = "mentor Updated Successfully";
              header('Location:mentors.php');
      }
      else
      {
          $_SESSION['status'] = "Failed To Update mentor";
          header('Location:mentors.php');
      }


  }


  /* Delete  mentor */

  if(isset($_POST['delete_mentor']))
  {
                                                                                   
          $id = $_POST['delete_mentorid'];                                                                       
          $query = "DELETE FROM mentor WHERE id='$id' ";
          $query_run = mysqli_query($connection,$query);
                                                           
          if($query_run)
          {
                  $_SESSION['success'] = "mentor Deleted Successfully... :)";
                  header('Location:  mentors.php');
          }
          else
          {
                  $_SESSION['status'] = "mentor Not Deleted ? Try Again....";
                  header('Location:   mentors.php');
          }
                                                                                              
  }  

















































 
    /*Add Event*/

    if(isset($_POST['add_event']))
    {
    
        $token = '123412321321412320970033241232412321421232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $id = substr($token, 0, 10);

        
            $type = $_POST['type'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $duration = $_POST['duration'];
            $location = $_POST['location'];
            $pdf = $_POST['pdf'];
            $price = $_POST['price'];
            $incharge = $_POST['incharge'];
            $mentor = $_POST['mentor'];
         
            date_default_timezone_set('Asia/Kolkata');
            $created_at = date('d-m-Y');

            $query = "INSERT INTO events (id,type,title,description,image,duration,location,pdf,price,incharge,mentor,created_at) VALUES ('$id','$type','$title','$description','$image','$duration','$location','$pdf','$price','$incharge','$mentor','$created_at')";
            $query_run = mysqli_query($connection,$query);

        

            if($query_run)
            {
                $_SESSION['success'] = "New Event Added Successfully";
                header('Location: events.php');
            }
            else
            {
                $_SESSION['status'] = "Failed To Add New Event";
                header('Location: events.php');
            }




    }








  /*Update Event */

  if(isset($_POST['update_event']))
  {
  
    $id = $_POST['update_eventid'];   

 
        
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $duration = $_POST['duration'];
    $location = $_POST['location'];
    $pdf = $_POST['pdf'];
    $price = $_POST['price'];
    $incharge = $_POST['incharge'];
    $mentor = $_POST['mentor'];

 
    $query = "UPDATE events SET type = '$type',title = '$title',description ='$description',image = '$image' , duration = '$duration' , location = '$location' , pdf = '$pdf' , price = '$price' , incharge = '$incharge', mentor = '$mentor' WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);
                                                              
      if($query_run)
      {
              $_SESSION['success'] = "Event Updated Successfully";
              header('Location:events.php');
      }
      else
      {
          $_SESSION['status'] = "Failed To Update Event";
          header('Location:events.php');
      }


  }


  /* Delete  Event */

  if(isset($_POST['delete_event']))
  {
                                                                                   
          $id = $_POST['delete_eventid'];                                                                       
          $query = "DELETE FROM events WHERE id='$id' ";
          $query_run = mysqli_query($connection,$query);
                                                           
          if($query_run)
          {
                  $_SESSION['success'] = "Event Deleted Successfully... :)";
                  header('Location:  events.php');
          }
          else
          {
                  $_SESSION['status'] = "Event Not Deleted ? Try Again....";
                  header('Location:   events.php');
          }
                                                                                              
  }  













 
    /*Add Transaction*/

    if(isset($_POST['add_transaction']))
    {
    
        $token = '123412321321aASDFSDFJJCLENOREKLXIOMSDCJSEJCJAPPKEDSLKSLabjchjdnrehsocikenkchsjhfjdasuerilskfdjua;seirpoewjckld1232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $order_id = "order_".substr($token, 0, 14);

        $token1 = '12341232132141232097003324123aASDFSDFJJCLENOREKLXIOMSDCJSEJCJAPPKEDSLKSLabjchjdnrehsocikenkchsjhfjdasuerilskfdjua;seirpoewjckld2412321421232121241201089723223232123208078011324';
        $token1 = str_shuffle($token1);
        $payment_id = "pay_".substr($token1, 0, 14);



            $email = $_POST['email'];

            $query1 = "SELECT * FROM users WHERE email = '$email'";
            $query_run1 = mysqli_query($connection,$query1);
            $row1 = mysqli_fetch_assoc($query_run1);

            $user_id = $row1['id'];
            $event = $_POST['event'];

            $query2 = "SELECT * FROM events WHERE id = '$event'";
            $query_run2 = mysqli_query($connection,$query2);
            $row2 = mysqli_fetch_assoc($query_run2);

            $event_type = $row2['type'];

            $amount = $_POST['amount'];
            $status = "success";
        
            date_default_timezone_set('Asia/Kolkata');
            $txn_time = date('d-m-Y H:i:s');

            $query = "INSERT INTO transactions (order_id,payment_id,user_id,event_id,event_type,amount,status,txn_time) VALUES ('$order_id','$payment_id','$user_id','$event','$event_type','$amount','$status','$txn_time')";
            $query_run = mysqli_query($connection,$query);

        

            if($query_run)
            {
                $_SESSION['success'] = "New Transaction Added Successfully";
                header('Location: transactions.php');
            }
            else
            {
                $_SESSION['status'] = "Failed To Add New Transaction";
                header('Location: transactions.php');
            }




    }








  /*Update Transaction */

  if(isset($_POST['update_transaction']))
  {
  
    $id = $_POST['update_transactionid'];   

 

    $email = $_POST['email'];

    $query1 = "SELECT * FROM users WHERE email = '$email'";
    $query_run1 = mysqli_query($connection,$query1);
    $row1 = mysqli_fetch_assoc($query_run1);

    $user_id = $row1['id'];
    $event = $_POST['event'];

    $query2 = "SELECT * FROM events WHERE id = '$event'";
    $query_run2 = mysqli_query($connection,$query2);
    $row2 = mysqli_fetch_assoc($query_run2);

    $event_type = $row2['type'];


    $amount = $_POST['amount'];
    $status = "success";


 
    $query = "UPDATE transactions SET user_id = '$user_id',event_id = '$event',event_type='$event_type',amount ='$amount'' WHERE order_id = '$id'";
    $query_run = mysqli_query($connection,$query);
                                                              
      if($query_run)
      {
              $_SESSION['success'] = "Transaction Updated Successfully";
              header('Location:transactions.php');
      }
      else
      {
          $_SESSION['status'] = "Failed To Update Transaction";
          header('Location:transactions.php');
      }


  }


  /* Delete  transaction */

  if(isset($_POST['delete_transaction']))
  {
                                                                                   
          $id = $_POST['delete_transactionid'];                                                                       
          $query = "DELETE FROM transactions WHERE order_id='$id' ";
          $query_run = mysqli_query($connection,$query);
                                                           
          if($query_run)
          {
                  $_SESSION['success'] = "Transaction Deleted Successfully... :)";
                  header('Location:  transactions.php');
          }
          else
          {
                  $_SESSION['status'] = "Transaction Not Deleted ? Try Again....";
                  header('Location:   transactions.php');
          }
                                                                                              
  }  




  
    
?>