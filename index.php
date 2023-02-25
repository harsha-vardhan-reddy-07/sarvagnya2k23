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
    

    @font-face {
            font-family: blackpast;
            src: url('./assets/fonts/blackpastdemo-vm2l9-webfont.woff');
        }
        @font-face {
            font-family: researcher;
            src: url('./assets/fonts/researcher-researcher-regular-400-webfont.woff');
        }
        @font-face {
            font-family: mynerva;
            src: url('./assets/fonts/mynerve-regular-webfont.woff');
        }

        html {
            scroll-behavior: smooth;
        }


        body{
            margin: 0;
            padding: 0;
            background: rgb(70,5,48);
            background: linear-gradient(-45deg, rgb(50, 3, 34) 0%, rgba(0,0,0,1) 38%, rgba(17,32,72,1) 99%);
            background-attachment: fixed;
        }

        /* Scroll bar */

        ::-webkit-scrollbar-thumb {
            background-color: #d97e7e;
            border-radius: 10px;
            border: 5px;
        }
        ::-webkit-scrollbar-track {
            background-color: transparent;
        }
        ::-webkit-scrollbar {
            width: 10px;
            background-color: #e8e8e800;
            display: none;
        }
    
            /* home page-main */

            .home-hero-container{
            height: 100vh;
        }

        .home_bg_video{
            object-fit: cover;
            position: absolute;
            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: 1;
            filter:brightness(45%);
        }
        .hero-content{
            z-index: 2;
            position: relative;
            text-align: center;
        }
        .hero-content h1{
            font-family: researcher;
            font-size: 6rem;
            font-weight: 600;
            background-image: linear-gradient(rgba(255, 255, 255, 1) 65%, rgba(20, 17, 17, 0.89) 100%);
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
            padding-top: 30vh;
        }
        .hero-content h3{
            font-family: researcher;
            font-size: 2rem;
            font-weight: 600;
            background-image: linear-gradient(rgba(255, 240, 240, 0.8) 48.96%, rgba(101, 75, 89, 0.7) 100%);
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
        }
        .hero-content p{
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.5rem;
            font-weight: 400;
            color: rgba(224, 238, 249, 0.811);
            padding-top: 10vh;
            padding-bottom: 5vh;
        }
        .hero-content a{
            
            font-size: 1rem;
            font-family: 'JetBrains Mono', monospace;
            color: rgb(224, 238, 249);
            
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            background: #2585CF;
            background: linear-gradient(to bottom right, #2585CF 21%, #CF25BE 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            border: 1px solid #ffebeb9b;
            border-radius: 20px;

        }
        .hero-explore-btn:hover{
            text-decoration: none;
            background-color: rgb(34, 82, 123);
            color: #2585CF;
            
        }

        @media screen and (max-width: 1000px){
            .hero-content h1{
                font-size: 3.5rem;
            }
        }
        @media screen and (max-width: 600px){
            .hero-content h1{
                font-size: 2rem;
                padding-top: 40vh;
                background-image: linear-gradient(rgba(255, 255, 255, 1) 65%, rgba(71, 71, 71, 0.89) 100%);
            }
            .hero-content h3{
                font-size: 1.3rem;
            }
            .hero-content p{
                padding-left: 5%;
                padding-right: 5%;
            }
            .hero-content a{
                position: absolute;
                top: 80vh;
                left: 25%;
                width: 50%;
            }
            
        }
        

        /* sponsors page */
        .sponsors-page{
            height: 100vh;
            background-color: transparent;
            padding-top: 10vh;
            text-align: center;
        }
        .sponsors-page h1{
            color: aliceblue;
            font-family: blackpast;
            padding-top: 5%;
            font-size: 2.5rem;
        }
        .sponsors-page p{
            color: rgba(240, 248, 255, 0.42);
            padding-top: 15%;
            font-size: 1rem;
        }
        @media screen and (max-width:700px){
            .sponsors-page p{
                padding-top: 30vh;
            }
        }

        /* memories page */
        
        .memories-page{
            min-width: 100%;
            max-width: 100%;
            height: 90vh;
            background-color: transparent;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            overflow: hidden;
            font-family: mynerva;
        }

        .memories-page h1{
            font-size: 2rem;
            margin-bottom: 1rem;
            font-family: blackpast !important;
            color: #fff;
        }


        .memories-page div:nth-child(1){
            margin-left: 2rem;
        }

        .memories-page div:nth-child(2){
            margin-right: 2rem;
            text-align: center;
            color: #ecf7ffdd;
        }

        .memories-page div:nth-child(2) p{
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .memories-page div:nth-child(2) p span{
            color: #78bde7be;
        }

        .memories-page div:nth-child(2) a{
            color: #8dccf3c8;
            font-size: 1.2rem;
            border: 0;
            outline: 0;
            border: 1px solid #8dccf3c8;
            border-radius: 5rem;
            padding: 1rem 1rem;
            text-decoration: none;
            margin: 1rem 0 2rem 0;
        }

        .memories-page div:nth-child(2) a:hover{
            cursor: pointer;
            background-color: #8dccf31d;
            border-color: #8dccf336;
            color: #e7eefd;
        }

        .youtube--container{
            width: 40vw;
            height: 315px;
            border-radius: 0.5rem;
        }
        @media screen and (max-width: 1100px){
            .memories-page{
                flex-direction: column-reverse;
                justify-content: center;
                align-items: center;
                gap: 0;
            }
            .memories-page div:nth-child(2){
                margin-right: 0;
            }

            .memories-page h1{
                font-size: 1.8rem;
                margin-bottom: 0rem;
            }

            .youtube--container{
                height: 220px;
                width: 320px;
                margin-left: 0;
                margin-top: 15%;
            }

            .memories-page p{
                margin-left: 1rem;
                margin-right: 1rem;
            }

            .memories-page div:nth-child(2) p{
                font-size: 1.25rem;
                margin-top: 1.5rem;
            }

            .memories-page div:nth-child(1){
                margin-right: 2rem;
            }
        }
            

        /* workshop section */

        .workshop-page{
            height: 90vh;
            background-image: url('./assets/images/home-page/workshop-bg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .workshop-page h1{
            color: rgb(255, 255, 255);
            font-family: blackpast;
            padding-top: 10%;
            font-size: 2.5rem;
        }
        .workshop-page p{
            padding: 1.5% 17% 0 17%;
            color: #edf3ffb4;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .workshop-typing{
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.2rem !important;
            color: #f5f8ffee !important;
            font-weight: 400 !important;
        }
        .workshop-page a{
            
            font-size: 1rem;
            font-family: 'JetBrains Mono', monospace;
            color: rgba(193, 219, 239, 0.817);
            
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            margin-top: 5%;
            border: 1px solid #ffebeb9b;
            border-radius: 20px;

        }
        .hero-workshop-btn:hover{
            cursor: pointer;
            background-color: #8dccf31d;
            border-color: #8dccf336;
            color: #e7eefd;
            
        }

        @media screen and (max-width:700px) {
            .workshop-page h1{
                padding-top: 55%;
            }
            .workshop-page p{
                padding: 1.5% 5% 0 5% !important;
                font-size: 0.7rem;
            }
            .workshop-page a{
                position: absolute;
                top: 70vh;
                left: 25%;
                width: 50%;
            }
        }
    
    /* Technical Events */

    .techeve-page{
            height: 90vh;
            background-image: url('./assets/images/home-page/techeve-bg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .techeve-page h1{
            color: rgb(255, 255, 255);
            font-family: blackpast;
            padding-top: 10%;
            font-size: 2.5rem;
        }
        .techeve-page p{
            padding: 1.5% 17% 0 17%;
            color: #edf3ffb4;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            font-weight: bold;
        }
        .Technical-typing{
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.2rem !important;
            color: #f5f8ffee !important;
            font-weight: 400 !important;
        }
        .techeve-page a{
            
            font-size: 1rem;
            font-family: 'JetBrains Mono', monospace;
            color: rgba(193, 219, 239, 0.817);
            
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            margin-top: 5%;
            border: 1px solid #ffebeb9b;
            border-radius: 20px;

        }
        .hero-technical-btn:hover{
            cursor: pointer;
            background-color: #8dccf31d;
            border-color: #8dccf336;
            color: #e7eefd;
            
        }

        @media screen and (max-width:700px) {
            .techeve-page h1{
                padding-top: 55%;
            }
            .techeve-page p{
                padding: 1.5% 5% 0 5% !important;
                font-size: 0.7rem;
            }
            .techeve-page a{
                position: absolute;
                top: 70vh;
                left: 25%;
                width: 50%;
            }
        }

        /* Cultural Events */

    .cultural-page{
            height: 90vh;
            background-image: url('./assets/images/home-page/cultural-bg.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .cultural-page h1{
            
            font-family: 'Shantell Sans', cursive;
            font-weight: 600;
            padding-top: 10%;
            font-size: 2.5rem;
            background: linear-gradient(180deg, #84B9F9 70%, rgba(242, 126, 126, 0.5) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;


            text-shadow: 3px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .cultural-page p{
            padding: 1.5% 17% 0 17%;
            font-family: 'Shantell Sans', cursive;
            font-size: 1rem;
            font-weight: bold;
            background: linear-gradient(90deg, #84B9F9 17.97%, rgba(153, 54, 189, 0.847) 46.33%, rgba(242, 126, 126, 0.587) 79.15%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
        .cultural-page a{
            
            font-size: 1rem;
            font-family: mynerva;
            color: rgba(193, 219, 239, 0.817);
            
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            margin-top: 5%;
            border: 1px solid #ffebeb9b;
            border-radius: 20px;

        }
        .hero-cultural-btn:hover{
            cursor: pointer;
            background-color: #8dccf31d;
            border-color: #8dccf336;
            color: #e7eefd;
            
        }

        @media screen and (max-width:700px) {
            .cultural-page h1{
                padding-top: 60%;
            }
            .cultural-page p{
                padding: 1.5% 5% 0 5% !important;
                font-size: 0.7rem;
            }
            .cultural-page a{
                margin-top: 15%;
            }
        }
        



    </style>


</head>

<body>

<?php require_once 'components/navbar.php'; ?>
   

      <!-- Hero page -->

      <section class="home-hero-container ">
        <video autoplay muted loop class="home_bg_video">
            <source src="./assets/videos/bg-vid-new.mp4" type="video/mp4" />
        </video>

        <div class="hero-content text-center">
            <h1 class="hero-title">SARVAGNYA</h1>
            <h3>2k23</h3>
            <p><span id="text"></span>_</p>
            <a class="btn hero-explore-btn" href="#memories-page">Explore more!!</a>
            
        </div>
    </section>


    <!-- Sponsors page -->

    <section class="sponsors-page">
        <h1>Our Sponsors</h1>
        <p>Will be updated shortly....!</p>
    </section>


    <!-- Memories page -->

    <div></div>
 
    <section id="memories-page" class="memories-page" data-scroll-section="">
        <div>
        <iframe  src="https://www.youtube.com/embed/zFmS-JLMeJM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="youtube--container"></iframe>
        </div>
        <div>
        <h1>FLASHBACK CHRONICLES</h1>
        <p>Get ready to time travel down memory lane as we revisit the mind-blowing moments from past editions of <span>Sarvagnya</span> - our tech fest extravaganza!</p>
        <a href="#">Let's time travel...!</a>
        </div>
    </section>


    <!-- Workshop page -->

    <section class="workshop-page text-center">

        <h1>Workshops</h1>
        
        <p>Elevate your tech prowess and let your creativity run wild with Sarvagnya's innovative workshops! Join us and dive into the exciting worlds of <span style="color: #98c7ec9d;"> ethical hacking, data science, and MERN stack.</span> Discover the latest trends and become a tech trailblazer!</p>
        <p class="workshop-typing"><span id="text-workshop"></span>_</p>
        <a class="btn hero-workshop-btn" href="events.php#workshops-regi">Join Now!!</a>
    </section>

    <!-- Technical Events -->


    <section class="techeve-page">
        <h1>Technical Events</h1>
        <p>Unleash your inner geek at Sarvagnya's technical events! With mind-bending <span style="color: #844d72c8;"> quizzes, coding challenges, and poster presentations,</span> we're taking innovation to the next level. Join us for an insane and unforgettable experience!</p>
        <p class="Technical-typing"><span id="text-technical"></span>_</p>
        <a class="btn hero-technical-btn" href="events.php#technical-regi">Join Now!!</a>
    </section>


    <!-- Cultural Events -->


    <section class="cultural-page">
        <h1>Cultural Events</h1>
        <p>Prepare to unleash your inner wild child, throw caution to the wind and dance like a maniac, sing like a rockstar, and immerse yourself in the electrifying energy of Sarvagnya's mind-blowing cultural events! Let's get crazy, baby!</p>
        <a class="btn hero-cultural-btn" href="#">Epicventure awaits!!!</a>
    </section>



    <!-- Schedule -->

    <section class="cultural-events-page">

    </section>



<?php require_once 'components/footer.php'; ?>



    <!-- navbar script -->
    
    <script>
    const navbar = document.querySelector('#navbar');
    const main = document.querySelector('main');
    
    function toggleNavbar() {
      if (window.scrollY > 100) {
        navbar.classList.add('visible');
      } else {
        navbar.classList.remove('visible');
      }
    }
    
    window.addEventListener('scroll', toggleNavbar);
</script>

<!-- Typing effect script -->

<script type="text/javascript">

    var _CONTENT = ["Welcome to the Tech fest organized by CSE", "Get ready to Explore the knowledge" ];
    var _PART = 0;
    var _PART_INDEX = 0;
    var _INTERVAL_VAL;
    var _ELEMENT = document.querySelector("#text");
    function Type() { 
        var text =  _CONTENT[_PART].substring(0, _PART_INDEX + 1);
        _ELEMENT.innerHTML = text;
        _PART_INDEX++;
        if(text === _CONTENT[_PART]) {
            clearInterval(_INTERVAL_VAL);
            setTimeout(function() {
                _INTERVAL_VAL = setInterval(Delete, 50);
            }, 1000);
        }
    }
    function Delete() {
        var text =  _CONTENT[_PART].substring(0, _PART_INDEX - 1);
        _ELEMENT.innerHTML = text;
        _PART_INDEX--;
        if(text === '') {
            clearInterval(_INTERVAL_VAL);
            if(_PART == (_CONTENT.length - 1))
                _PART = 0;
            else
                _PART++;
            _PART_INDEX = 0;
            setTimeout(function() {
                _INTERVAL_VAL = setInterval(Type, 100);
            }, 200);
        }
    }
    _INTERVAL_VAL = setInterval(Type, 100);
</script>
    

<!-- Workshop typing -->

<script type="text/javascript">

    var _CONTENT2 = ["Tech up, level up with Sarvagnya's wild workshops!"];
    var _PART2 = 0;
    var _PART_INDEX2 = 0;
    var _INTERVAL_VAL2;
    var _ELEMENT2 = document.querySelector("#text-workshop");
    function Type2() { 
        var text2 =  _CONTENT2[_PART2].substring(0, _PART_INDEX2 + 1);
        _ELEMENT2.innerHTML = text2;
        _PART_INDEX2++;
        if(text2 === _CONTENT2[_PART2]) {
            clearInterval(_INTERVAL_VAL2);
            setTimeout(function() {
                _INTERVAL_VAL2 = setInterval(Delete2, 50);
            }, 1000);
        }
    }
    function Delete2() {
        var text2 =  _CONTENT2[_PART2].substring(0, _PART_INDEX2 - 1);
        _ELEMENT2.innerHTML = text2;
        _PART_INDEX2--;
        if(text2 === '') {
            clearInterval(_INTERVAL_VAL2);
            if(_PART2 == (_CONTENT2.length - 1))
                _PART2 = 0;
            else
                _PART2++;
            _PART_INDEX2 = 0;
            setTimeout(function() {
                _INTERVAL_VAL2 = setInterval(Type2, 100);
            }, 200);
        }
    }
    _INTERVAL_VAL2 = setInterval(Type2, 100);
</script>


<!-- Technical-Eve typing -->

<script type="text/javascript">

    var _CONTENT3 = ["Embrace the Madness at Sarvagnya's Technical Events!"];
    var _PART3 = 0;
    var _PART_INDEX3 = 0;
    var _INTERVAL_VAL3;
    var _ELEMENT3 = document.querySelector("#text-technical");
    function Type3() { 
        var text3 =  _CONTENT3[_PART3].substring(0, _PART_INDEX3 + 1);
        _ELEMENT3.innerHTML = text3;
        _PART_INDEX3++;
        if(text3 === _CONTENT3[_PART3]) {
            clearInterval(_INTERVAL_VAL3);
            setTimeout(function() {
                _INTERVAL_VAL3 = setInterval(Delete3, 50);
            }, 1000);
        }
    }
    function Delete3() {
        var text3 =  _CONTENT3[_PART3].substring(0, _PART_INDEX3 - 1);
        _ELEMENT3.innerHTML = text3;
        _PART_INDEX3--;
        if(text3 === '') {
            clearInterval(_INTERVAL_VAL3);
            if(_PART3 == (_CONTENT3.length - 1))
                _PART3 = 0;
            else
                _PART3++;
            _PART_INDEX3 = 0;
            setTimeout(function() {
                _INTERVAL_VAL3 = setInterval(Type3, 100);
            }, 200);
        }
    }
    _INTERVAL_VAL3 = setInterval(Type3, 100);
</script>
    
    


<!-- bootstrap script -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




</body>
</html>