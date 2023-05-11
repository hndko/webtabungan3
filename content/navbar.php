<?php
$pages = array(
  'index.php?m=awal',
  'index.php?m=siswa&s=awal',
  'index.php?m=kelas&s=awal',
  'index.php?m=tabungan&s=awal',
  'logout.php'
);
?>

<style>
  /* FONT */

  @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap');
  /* FONT END */

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
  }

  nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: black;
    height: 10vh;
    padding: 0 5%;
    font-family: Arial, Helvetica, sans-serif;
    /* position: fixed; */
    width: 100%;
    z-index: 2;
  }

  .logo {
    cursor: pointer;
    font-size: x-large;
  }

  .logo a {
    text-decoration: none;
    color: white;
    font-family: 'Libre Baskerville', serif;
  }

  .nav-links {
    display: flex;
    justify-content: space-around;
    width: 40%;
    margin: 0;
  }

  .nav-links li {
    list-style: none;
  }

  .nav-links a {
    color: white;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 14px;

  }

  .burger {
    display: none;
    cursor: pointer;
  }

  .burger div {
    width: 25px;
    height: 3px;
    background-color: black;
    margin: 5px;
    transition: all 0.3s ease;
  }

  @media screen and (max-width: 1024px) {
    .nav-links {
      width: 60%;
    }
  }

  @media screen and (max-width: 768px) {
    body {
      overflow-x: hidden;
    }

    .nav-links {
      position: absolute;
      right: 0px;
      height: 92vh;
      top: 8vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 50%;
      transform: translateX(100%);
      transition: transform 0.5s ease-in;
    }

    .nav-links li {
      opacity: 0;
    }

    .burger {
      display: block;
    }
  }

  .nav-active {
    transform: translateX(0%);
  }

  @keyframes navLinkFade {
    from {
      opacity: 0;
      transform: translateX(50px);
    }

    to {
      opacity: 1;
      transform: translateX(0px);
    }
  }

  .toggle .line1 {
    transform: rotate(-45deg) translate(-5px, 6px);
  }

  .toggle .line2 {
    opacity: 0;
  }

  .toggle .line3 {
    transform: rotate(45deg) translate(-5px, -6px);
  }

  .disabled {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.5;
  }

  .nav-links li:last-child a {
    background-color: red;
    padding: 10px 15px;
    border-radius: 5px;
  }
</style>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <nav>
    <div class="logo">
      <a href="#">
        Yuk Menabung
      </a>
    </div>

    <ul class="nav-links">
      <?php for ($i = 0; $i < count($pages); $i++) : ?>
        <li>
          <a href="<?php echo $pages[$i]; ?>" <?php if (strpos($_SERVER['REQUEST_URI'], $pages[$i]) !== false) {
                                                echo 'class="disabled"';
                                              } ?>>
            <?php if ($i == 0) : ?>
              <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard
            <?php elseif ($i == 1) : ?>
              <i class="fa fa-user" aria-hidden="true"></i> Siswa
            <?php elseif ($i == 2) : ?>
              <i class="fa fa-book" aria-hidden="true"></i> Kelas
            <?php elseif ($i == 3) : ?>
              <i class="fa fa-money" aria-hidden="true"></i> Tabungan
            <?php elseif ($i == 4) : ?>
              <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
            <?php endif; ?>
          </a>

        </li>
      <?php endfor; ?>

    </ul>
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>

  <br>
  <br>

  <script>
    const navSlide = () => {
      const burger = document.querySelector(".burger");
      const nav = document.querySelector(".nav-links");
      const navLinks = document.querySelectorAll(".nav-links li");

      burger.addEventListener("click", () => {
        // Toggle Nav
        nav.classList.toggle("nav-active");

        // Animate Links
        navLinks.forEach((link, index) => {
          if (link.style.animation) {
            link.style.animation = "";
          } else {
            link.style.animation = `navLinkFade 0.5s ease forwards ${
          index / 7 + 0.3
        }s`;
          }
        });

        // Burger Animation
        burger.classList.toggle("toggle");
      });
    };

    navSlide();
  </script>

</body>

</html>