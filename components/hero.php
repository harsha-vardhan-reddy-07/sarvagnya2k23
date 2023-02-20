<style>
.bgimage {
    font-family: "Ubuntu", sans-serif;
    width: 100%;
    height: 500px;
    background-color: orange;
    background: url("assets/images/hero3.png");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
}

.hero_text {
    font-family: "Ubuntu", sans-serif;
    text-shadow: 2px 2px #333;
    text-align: center;
    top: 50%;
    position: absolute;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

.hero_title {
    font-size: 35px;
}

@media (max-width: 680px) {
    .hero_text {
        top: 40%;
    }

}

@media (min-width: 280px) {

    /* smartphones, iPhone, portrait 480x320 phones */
    .hero_text {
        top: 40%;
    }
}

@media (min-width: 481px) {

    /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
    .hero_text {
        top: 40%;
    }

}

@media (min-width: 641px) {

    /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
    .hero_text {
        top: 30%;
    }
}

@media (min-width: 961px) {

    /* tablet, landscape iPad, lo-res laptops ands desktops */
    .hero_text {
        top: 20%;
    }
}

@media (min-width: 1025px) {

    /* big landscape tablets, laptops, and desktops */
    .hero_text {
        top: 40%;
        right: 80% !important;
    }
}

@media (min-width: 1281px) {

    /* hi-res laptops and desktops */
    .hero_text {
        top: 40%;
        right: 80% !important;
    }
}

#demo {
    font-family: 'Orbitron', sans-serif !important;
}
</style>
<section class="bgimage ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero_text">
<br>
                <p class="hero_title" id="demo"></p>


                <h5 class="hero_title">Exploring Knowledge</h5>
            </div>
        </div>
    </div>
</section>