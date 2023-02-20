<?php
session_start();

$_SESSION['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
				"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
				$_SERVER['REQUEST_URI'];


$auth = isset($_SESSION['access_token']) || isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
require_once "components/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sarvagnya - 2022</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
    .title {
        font-family: "Ubuntu", sans-serif !important;
    }

    .card {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }
    </style>
</head>

<body>

    <?php require_once 'components/navbar.php'; ?>


    <br><br><br><br>



    <div class="container">
        <h2 class="text-dark  text-center title">Sponsors </h2>
        <hr>
        <h3 class="text-secondary title">Powered By</h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card my-2">
                    <div class="card-body text-center title">
                        <div class="row">
                            <div class="col-md-3" style="border-right:2px solid #8e9c91;">
                                <img src="https://i.ibb.co/dcr5g1S/leftsidelogo.png" width="250" height="150" alt="">
                                <h6>Uranium Corporation of India Limited</h6>
                            </div>
                            <div class="col-md-3 text-center">
                                <img src="https://i.ibb.co/2MLJQtG/msrao.png" width="280" height="230" alt="">
                            </div>
                            <div class="col-md-4 pt-2 m-auto text-center">
                                <h5>Shri M.S. Rao , General Manager, (Engg. Services, AP)</h5>
                                <h6>UCIL Thummalapalle , Pulivendula</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <br>

        <hr>
        <h3 class="text-secondary title">Leaders / Persons</h3>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body text-center title">
                        <img src="data:image/jpeg;base64,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"
                            width="250" height="250" alt="">
                        <hr>
                        <h5>Y. S. Avinash Reddy Garu</h5>
                        <h6>Member of Parliament</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body text-center title">
                        <img src="https://i.ibb.co/NyX53RB/Makers-of-Milkshake-removebg-preview.png" width="250" height="250" alt="">
                        <hr>
                        <h5>Rahul Thirumalapragada</h5>
                        <h6>Founder of <b>Makers of Milkshakes</b></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body text-center title">
                        <img src="https://i.postimg.cc/ryHw8MkW/karunakar.jpg" width="250" height="250" alt="">
                        <hr>
                        <h5>Mitta karunakar</h5>
                        <h6>Kanyaka super market</h6>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <h3 class="text-secondary title">Schools / Colleges / Institutions</h3>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Hp (Micro Care)</h5>
                        <h6>Vijayawada</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sri Swamy Vivekananda English Medium School</h5>
                        <h6>Pulivendula</h6>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>KSRM College</h5>
                        <h6>Kadapa</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Ganesh Computer Education</h5>
                        <h6>Opp. BVS Girls High School Indian Bank Upstair, Nellore, Andhra Pradesh.</h6>
                    </div>
                </div>
            </div>

        </div>


        <br>


        <h3 class="text-secondary title"> Alumni Students - 2.1 Lakh Still Counting..</h3>
        <hr>
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Vasu</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Chandra</h5>
                        <h6>2008 - 2012</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Mahendra</h5>
                        <h6>2009 - 2013</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Alekhya</h5>
                        <h6>2009 - 2013</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Thasleema</h5>
                        <h6>2010 - 2014</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Praneeth</h5>
                        <h6>2010 - 2014</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pramoda</h5>
                        <h6>2010 - 2014</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Muneiah</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Vamshi</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sujith Sangi</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Prasad</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sushmitha</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Praveen</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pawan</h5>
                        <h6>2011 - 2015</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Tejo Verma</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Vinay Goud</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sujana</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sujan</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Vinosh</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rahanuma</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Tanweer</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Hima Bindu</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pavan Kumar</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Ramya Srirama</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Urmila</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rupa Sree</h5>
                        <h6>2014 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Vishnu Kumar</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rudra Teja</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Suhel</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Arshiya Yasmine</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Chaithra</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Raghavendra</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Swetha</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Subramanyam</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bharathi</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Shivananda Reddy</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Deepak</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Lakshmi</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bhavana</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pooja</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Gopika</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sushma Swaraj</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sushmitha</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Shasthry</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Raghavendra</h5>
                        <h6>2017 - 2021</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Architha</h5>
                        <h6>2017 - 2021</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Tharun</h5>
                        <h6>2015 - 2019</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sailesh</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Praneeth</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Kalyan</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Mohan</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Chaithanya Krishna</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Harish</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Mahesh</h5>
                        <h6>2010 - 2014</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Hari Chandana</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Aruna</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bhaskar</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Musfira</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Chaithanya</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bramha Teja</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rubiya</h5>
                        <h6>2007 - 2011</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Hema</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
      <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Purushotham</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
                  <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Varsha</h5>
                        <h6>2017 - 2021</h6>
                    </div>
                </div>
            </div>
            
                  <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Suneel</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Mahesh</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Ananthaiah</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Prem</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Jaya Simha</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sumanth</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Mehatab</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Suvarna</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Punith</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                          <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pradeep</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                               <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Harsha</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                               <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Avnesh</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                               <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rahul</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                               <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Chethan Chandra</h5>
                        <h6>2017 - 2021</h6>
                    </div>
                </div>
            </div>
                                <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rama Krishna & Batch</h5>
                        <h6>2017 - 2021</h6>
                    </div>
                </div>
            </div>
                                <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Jagadeesh</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
                                   <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Manoj Vaibhav</h5>
                        <h6>2012 - 2016</h6>
                    </div>
                </div>
            </div>
                                   <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Rahimanuddin</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                                   <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Shaguftha</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
                                     <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sana Babu</h5>
                        <h6>2016 - 2020</h6>
                    </div>
                </div>
            </div>
                                     <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Pavan,Venu,Vamshi</h5>
                        <h6>2006 - 2010</h6>
                    </div>
                </div>
            </div>
                                     <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Niranjan</h5>
                        <h6>2008 - 2012</h6>
                    </div>
                </div>
            </div>
                                     <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Upendar</h5>
                        
                    </div>
                </div>
            </div>
                                     <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Shashank</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                                                 <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bagadi Jeevan</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
                                                 <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Farahtullah</h5>
                        <h6>2013 - 2017</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Sandhya</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Raveena</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-2">
                    <div class="card-body title">
                        <h5>Bhavana</h5>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <br>
    <br>









    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>