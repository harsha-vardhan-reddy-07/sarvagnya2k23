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
    <title>Sarvagnya - 2023</title>

    <?php require_once 'components/links.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
    .title{
        font-family:"Ubuntu","Lato" !important;
    }
    /*===== Vertical Timeline =====*/
    #conference-timeline {
        position: relative;
        max-width: 920px;
        width: 100%;
        margin: 0 auto;
    }

    #conference-timeline .timeline-start,
    #conference-timeline .timeline-end {
        display: table;
        font-family: "Ubntu", sans-serif;
        font-size: 18px;
        font-weight: 900;
        text-transform: uppercase;
        background: #00b0bd;
        padding: 15px 23px;
        color: #fff;
        max-width: 5%;
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }

    #conference-timeline .conference-center-line {
        position: absolute;
        width: 3px;
        height: 100%;
        top: 0;
        left: 50%;
        margin-left: -2px;
        background: #00b0bd;
        z-index: -1;
    }

    #conference-timeline .conference-timeline-content {
        padding-top: 67px;
        padding-bottom: 67px;
    }

    .timeline-article {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        margin: 20px 0;
    }

    .timeline-article .content-left-container,
    .timeline-article .content-right-container {
        max-width: 44%;
        width: 100%;
    }

    .timeline-article .timeline-author {
        display: block;
        font-weight: 400;
        font-size: 14px;
        line-height: 24px;
        color: #242424;
        text-align: right;
    }

    .timeline-article .content-left,
    .timeline-article .content-right {
        position: relative;
        width: auto;
        border: 1px solid #ddd;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .03);
        padding: 27px 25px;
            margin-right: 10px;
    }

    .timeline-article p {
        margin: 0 0 0 60px;
        padding: 0;
        font-weight: 400;
        color: #242424;
        font-size: 14px;
        line-height: 24px;
        position: relative;
    }

    .timeline-article p span.article-number {
        position: absolute;
        font-weight: 300;
        font-size: 44px;
        top: 10px;
        left: -60px;
        color: #00b0bd;
    }

    .timeline-article .content-left-container {
        float: left;
    }

    .timeline-article .content-right-container {
        float: right;
    }

    .timeline-article .content-left:before,
    .timeline-article .content-right:before {
        position: absolute;
        top: 20px;
        font-size: 23px;
        font-family: "FontAwesome";
        color: #fff;
    }

    .timeline-article .content-left:before {
        content: "\f0da";
        right: -8px;
    }

    .timeline-article .content-right:before {
        content: "\f0d9";
        left: -8px;
    }

    .timeline-article .meta-date {
        position: absolute;
        top: 0;
        left: 50%;
        width: 62px;
        height: 62px;
        margin-left: -31px;
        color: #fff;
        border-radius: 100%;
        background: #00b0bd;
    }

    .timeline-article .meta-date .date,
    .timeline-article .meta-date .month {
        display: block;
        text-align: center;
        font-weight: 900;
    }

    .timeline-article .meta-date .date {
        font-size: 30px;
        line-height: 40px;
    }

    .timeline-article .meta-date .month {
        font-size: 18px;
        line-height: 10px;
    }

    /*===== // Vertical Timeline =====*/

    /*===== Resonsive Vertical Timeline =====*/
    @media only screen and (max-width: 830px) {

        #conference-timeline .timeline-start,
        #conference-timeline .timeline-end {
            margin: 0;
        }

        #conference-timeline .conference-center-line {
            margin-left: 0;
            left: 50px;
        }

        .timeline-article .meta-date {
            margin-left: 0;
            left: 20px;
        }

        .timeline-article .content-left-container,
        .timeline-article .content-right-container {
            max-width: 100%;
            width: auto;
            float: none;
            margin-left: 110px;
            min-height: 53px;
        }

        .timeline-article .content-left-container {
            margin-bottom: 20px;
        }

        .timeline-article .content-left,
        .timeline-article .content-right {
            padding: 10px 25px;
            min-height: 65px;
        }

        .timeline-article .content-left:before {
            content: "\f0d9";
            right: auto;
            left: -8px;
        }

        .timeline-article .content-right:before {
            display: none;
        }
    }

    @media only screen and (max-width: 400px) {
        .timeline-article p {
            margin: 0;
        }

        .timeline-article p span.article-number {
            display: none;
        }

    }

    /*===== // Resonsive Vertical Timeline =====*/
    </style>


</head>

<body>


    <?php require_once 'components/hero.php'; ?>



    <?php require_once 'components/slider.php'; ?>
    <?php require_once 'components/navbar.php'; ?>


    <br>
    <br>
    <h2 class=" font-weight-bold text-center title">Events Schedule</h2>
    <br>
    <!-- Vertical Timeline -->
    <section id="conference-timeline">
        <div class="timeline-start">Start</div>
        <div class="conference-center-line"></div>
        <div class="conference-timeline-content">
            <!-- Article -->
            <div class="timeline-article mr-2 title">
                <div class="content-left-container">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">9:00 AM -
                                11:00
                                AM</span> </h6>
                        <h6 class="font-weight-bold">Inaguration</h6>
                    </div>

                </div>
                <div class="content-right-container">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">11:00 AM - 11:15
                                AM</span>
                        </h6>
                        <h6 class="font-weight-bold">Break</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">11:15 AM - 1:00
                                PM</span></h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success"> 11:15 AM - 1:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">General Quiz (Round 1) / Paper Presentation</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">1:00 PM - 2:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Lunch Break</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success"> 2:00 PM - 3:30
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">2:00 PM - 3:30
                                PM</span></h6>
                        <h6 class="font-weight-bold">Paper Presentation</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary"> 3:30 PM - 3:45
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Snacks</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">3:45 PM - 5:00
                                PM</span></h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success"> 3:45 PM - 5:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Technical Quiz (Round 1)</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">5:00 PM - 7:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Flashmob</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success"> 5:00 PM - 7:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Spot Events</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">7:00 PM - 8:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Dinner</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary"> 8:00 PM - 10:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="meta-date">
                    <span class="date">28</span>
                    <span class="month">APR</span>
                </div>
            </div>
            <!-- // Article -->
            <hr>
            <!-- Article -->
            <div class="timeline-article title">

                <div class="content-left-container mt-2 title">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">9:00 AM - 11:00
                                AM</span></h6>
                        <h6 class="font-weight-bold">Coding Challenge</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary"> 11:00 AM - 11:15
                                AM </span>
                        </h6>
                        <h6 class="font-weight-bold text-info">Break</h6>
                    </div>
                </div>


                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">11:15 AM - 1:00
                                PM</span></h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">11:15 AM - 1:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">General Quiz (Round 2) / Poster Presentation</h6>
                    </div>
                </div>


                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">1:00 PM - 2:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Lunch Break</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">2:00 PM - 5:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>

                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">2:00 PM - 5:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Encoding & Decoding (Round 1)</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">5:00 PM - 6:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Spot Events</h6>
                    </div>
                </div>
                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">6:00 PM - 8:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Culturals</h6>
                    </div>
                </div>


                <div class="meta-date">
                    <span class="date">29</span>
                    <span class="month">APR</span>
                </div>
            </div>
            <hr>
            <!-- // Article -->
            <!-- Article -->
            <div class="timeline-article title">


                <div class="content-left-container mt-2 title">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success">9:00 AM - 11:00
                                AM</span></h6>
                        <h6 class="font-weight-bold text-info">Workshop</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-success"> 9:00 AM - 11:00
                                AM </span>
                        </h6>
                        <h6 class="font-weight-bold">Encoding & Decoding (Round 2)</h6>
                    </div>
                </div>

                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">11:00 AM - 12:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Capture The Flag</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary"> 12:00 PM - 1:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Technical Quiz (Round 2)</h6>
                    </div>
                </div>

                <div class="content-left-container mt-2">
                    <div class="content-left">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary">1:00 PM - 2:00
                                PM</span></h6>
                        <h6 class="font-weight-bold">Lunch Break</h6>
                    </div>
                </div>
                <div class="content-right-container mt-2">
                    <div class="content-right">
                        <h6 class="text-left font-weight-bold"> <span class="text-dark">Time : </span> <span
                                class="text-secondary"> 2:00 PM - 4:00
                                PM </span>
                        </h6>
                        <h6 class="font-weight-bold">Validatory</h6>
                    </div>
                </div>




                <div class="meta-date">
                    <span class="date">30</span>
                    <span class="month">APR</span>
                </div>
            </div>
            <!-- // Article -->

            <!-- // Article -->
        </div>
        <div class="timeline-end">End</div>
    </section>
    <!-- // Vertical Timeline -->

<p class="d-none"> Code : 5678</p>

    <br>
    <br>





    <?php require_once 'components/footer.php'; ?>
    <!-------- Mobile nav-------->

    <?php require_once 'components/mobile-nav.php'; ?>


</body>

</html>



<script>
$(document).ready(function() {
    $('#autoWidth,#autoWidth2').lightSlider({
        autoWidth: true,
        loop: true,
        onSliderLoad: function() {
            $('#autoWidth,#autoWidth2').removeClass('cS-hidden');
        }
    });
});
</script>


<script>
// Set the date we're counting down to
var countDownDate = new Date("Apr 28, 2022 22:56:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);


    if (days == 0) {
        document.getElementById("demo").innerHTML = hours + "h " +
            minutes + "m " + seconds + "s ";
    } else if (days == 0 && hours == 0) {
        document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
    } else {
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";
    }

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Live Now";
    }
}, 1000);
</script>