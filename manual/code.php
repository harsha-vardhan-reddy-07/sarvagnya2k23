<?php

include 'security.php';




    /* Admin Login */

    if(isset($_POST['login']))
    {

        $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
        $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
        $query = "SELECT * FROM recepition WHERE email = '$name' OR name = '$name'";
        $query_run = mysqli_query($connection,$query);
        $count = mysqli_num_rows($query_run);
    

        if($count > 0)
        { 
            $row = mysqli_fetch_assoc($query_run);
            if(password_verify($pass,$row['password']))
            {

                    $_SESSION['manual_id'] = $row['id'];
                    $_SESSION['manual_name'] = $row['name'];
                    header('Location: index.php');

            }
            else{

                $_SESSION['status'] = "Incorrect Credentials Please Check Once Again";
                header('Location: login.php');
            }
        }
        else{
            $_SESSION['status'] = "Recepition Admin Account Doesn't Exists";
            header('Location: login.php');
        }

    }



    /*Admin Logout */

    if(isset($_POST['logout']))
    {

        unset($_SESSION['manual_id']);
        unset($_SESSION['manual_name']);
        header('Location: login.php');
    }







 
    /*Add Transaction*/

    if(isset($_POST['add_transaction']))
    {
    
        $token = '123412321321aASDFSDFJJCLENOREKLXIOMSDCJSEJCJAPPKEDSLKSLabjchjdnrehsocikenkchsjhfjdasuerilskfdjuaseirpoewjckld1232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $order_id = "order_".substr($token, 0, 14);

        $token1 = '12341232132141232097003324123aASDFSDFJJCLENOREKLXIOMSDCJSEJCJAPPKEDSLKSLabjchjdnrehsocikenkchsjhfjdasuerilskfdjuaseirpoewjckld2412321421232121241201089723223232123208078011324';
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
            $a_m = "manual";
            date_default_timezone_set('Asia/Kolkata');
            $txn_time = date('d-m-Y H:i:s');

            $query = "INSERT INTO transactions (order_id,payment_id,user_id,event_id,event_type,amount,a_m,status,txn_time) VALUES ('$order_id','$payment_id','$user_id','$event','$event_type','$amount','$a_m','$status','$txn_time')";
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


 
    $query = "UPDATE transactions SET user_id = '$user_id',event_id = '$event',event_type='$event_type',amount ='$amount' WHERE order_id = '$id'";
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