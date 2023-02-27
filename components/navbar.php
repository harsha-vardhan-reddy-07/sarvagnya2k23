<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />

<style>











header {
    position: fixed;
    top: -500px;
    transition: top 0.3s;
    width: 100%;
    z-index: 999;
    background-color: #0B021B;
    height: 10vh;
}
header.visible{
    top: 0px;
}
@media screen and (max-width: 700px){
    header{
        top: 0px;
    }
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 1rem;
  padding: 2.5vh 2vw 0 0;
}

nav a {
  font-size: 1.2rem;
  text-decoration: none;
}
nav a#logo {
  color: #fff;
  font-size: 1.3rem;
  font-family: researcher;
  padding-left: 1.5%;
}
nav ul a {
  color: #d7d7d7;
}
nav a:hover {
  text-decoration: none;
  color: #fff;
}

#ham-menu {
  display: none;
}
nav ul.active {
    left: 0;
}

@media only screen and (max-width: 767px) {

    header {
    padding: 2vh 3vw;
  }

  #ham-menu {
    display: block;
    color: #ffffff;
  }
  nav a#logo,
  #ham-menu {
    font-size: 1.5rem;
  }
  nav ul {
    background-color: rgba(2, 8, 33, 0.705);
    position: fixed;
    left: -100vw;
    top: 10vh;
    width: 100vw;
    height: 90vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    transition: 1s;
    gap: 0;
  }
}
@media only screen and (max-width: 575px) {

  header {
    height: 8vh;
  }
  nav ul {
    top: 8vh;
    height: 92vh;
    justify-content: unset;
    gap: 2rem;
    
  }

}
</style>

  </head>
  <body>
    <header id="navbar-sarvagnya">
      <nav >
        <a href="https://www.sarvagnya2k23.in" id="logo">SARVAGNYA</a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
            <li class=" <?= (basename($_SERVER['PHP_SELF'])=="index.php")?"active":""; ?>">
              <a  href="index.php">Home</a>
            </li>
            <li class=" <?= (basename($_SERVER['PHP_SELF'])=="events.php")?"active":""; ?>">
                <a  href="events.php">Events</a>
            </li>
     <?php
    if ($auth) {
        ?>
            <li class=" <?= (basename($_SERVER['PHP_SELF'])=="registrations.php")?"active":""; ?>">
                <a  href="registrations.php">Registrations</a>
            </li>
        
        <?php
        } else {
        ?>
        <li class=" <?= (basename($_SERVER['PHP_SELF'])=="contact_us.php")?"active":""; ?>">
                <a  href="contact_us.php">Contact Us</a>
            </li>
    <?php
    }
    ?>
    <?php
    if (!$auth) {
        // echo '<div class="p-2 login-btn bd-highlight"><a href="login-page" class="btn btn-outline-secondary addcart-btn text-center  btn-block ">SignIn</a></div>';
        echo '<li class=""><a  href="login-page" style="border: 1px solid #484648b8; width:max-content; border-radius: 0.4rem; padding: 5px 15px 5px 15px !important;;" >Login</a></li>';
    } else {
        // echo '<div class="p-2  login-btn bd-highlight"><a href="profile" class="btn btn-outline-secondary addcart-btn text-center  btn-block">' . $_SESSION['name'] . '</a></div>';
        echo '<li class=""><a  href="profile" style="border: 1px solid #484648b8; width:max-content; border-radius: 0.4rem; padding: 5px 15px 5px 15px !important;;" >' . $_SESSION['name'] . '</a></li>';
     }
    ?>
        </ul>
      </nav>
    </header>
    <!-- Script -->
    <script>
        let hamMenuIcon = document.getElementById("ham-menu");
let navBar = document.getElementById("nav-bar");
let navLinks = navBar.querySelectorAll("li");

hamMenuIcon.addEventListener("click", () => {
  navBar.classList.toggle("active");
  hamMenuIcon.classList.toggle("fa-times");
});
navLinks.forEach((navLinks) => {
  navLinks.addEventListener("click", () => {
    navBar.classList.remove("active");
    hamMenuIcon.classList.toggle("fa-times");
  });
});
    </script>
  </body>
</html>