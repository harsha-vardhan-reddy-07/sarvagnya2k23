<?php
session_start();
require_once 'components/database.php';


 
    /*Add Material*/

    if(isset($_POST['add_details']))
    {
    

        $user_id = $_SESSION['id'];
            $college_name = $_POST['college_name'];
            $branch = $_POST['branch'];
            $year = $_POST['year'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $github = $_POST['github'];
            $linkedin = $_POST['linkedin'];
         
            date_default_timezone_set('Asia/Kolkata');
            $created_at = date('d-m-Y');

            $query = "INSERT INTO user_details (id,college_name,branch,year,address,mobile,github,linkedin) VALUES ('$user_id','$college_name','$branch','$year','$address','$mobile','$github','$linkedin')";
            $query_run = mysqli_query($connection,$query);

        

            if($query_run)
            {
                $_SESSION['success'] = "Your Details Added Successfully";
                header('Location: profile.php');
            }
            else
            {
                $_SESSION['status'] = "Failed To Your Details";
                header('Location: profile.php');
            }




    }








  /*Update Details */

  if(isset($_POST['update_details']))
  {
  

      $user_id = $_SESSION['id'];
      $college_name = $_POST['college_name'];
      $branch = $_POST['branch'];
      $year = $_POST['year'];
      $address = $_POST['address'];
      $mobile = $_POST['mobile'];
      $github = $_POST['github'];
      $linkedin = $_POST['linkedin'];

      $query = "UPDATE user_details SET college_name = '$college_name',branch='$branch',year ='$year',address ='$address',mobile ='$mobile',github ='$github',linkedin ='$linkedin' WHERE id = '$user_id'";
      $query_run = mysqli_query($connection,$query);
                                                              
      if($query_run)
      {
              $_SESSION['success'] = "Details Updated Successfully";
              header('Location:profile.php');
      }
      else
      {
          $_SESSION['status'] = "Failed To Update Details";
          header('Location:profile.php');
      }


  }



?>