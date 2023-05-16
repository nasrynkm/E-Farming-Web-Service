<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Farmer's Dashboard</title>
  <link rel="stylesheet" href="../../css/dashFarming.css" />
  <link rel="stylesheet" href="../../css/pageTips.css" />
  <link rel="stylesheet" href="../../css/footer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <section>
    <section id="header">
      <a class="logo" href="#">E-Farming WS</a>

      <div>
        <ul id="navigation">
          <li><a href="./farmerDash.php">Dashboard</a></li>
          <li><a href="./addProduct.php">Adds Manager</a></li>
          <li><a class="active" href="./viewAdds.html">View Adds</a></li>
          <li><a href="#">Log Out</a></li>
          <!-- <input type="text" placeholder="Enter text to search..." /> -->
          <!-- <button><i class="fas fa-search"></i></button> -->
        </ul>
      </div>

      <a href="../profile.html"><img class="profImg" src="./img/2021-02-00747.jpg" alt="Profile" /></a>
      <div class="toggle-btn">
        <i class="fa-solid fa-bars-staggered"></i>
      </div>
    </section>

    <!-- STARTING THE DROP DOWN MENUS -->

    <section>
      <div class="dropMenu">
        <a href="../profile.html"><img class="profImg" src="./img/2021-02-00747.jpg" alt="Profile" /></a>

        <ul>
          <li><a href="./farmerDash.php">Dashboard</a></li>
          <li><a href="./addProduct.php">Adds Manager</a></li>
          <li><a class="active" href="./viewAdds.html">View Adds</a></li>
          <!-- <li><a href="">User Profile</a></li> -->
          <li><a href="">Log Out</a></li>
        </ul>
      </div>
    </section>

    <!-- STARTING THE MAIN BODY OF THE DASHBOARD -->

    <section class="pageTips">
      <!-- CONTAINER 01 -->
      <div class="containerTips containerLeft">
        <img src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>Welcome, Mr Naseeb</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 02 -->
      <div class="containerTips containerRight">
        <img src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>Adds Manager</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="rightArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 03 -->
      <div class="containerTips containerLeft">
        <img src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>Adds Section</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 04 -->
      <div class="containerTips containerRight">
        <img src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>Profile Photo</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="rightArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 05 -->
      <div class="containerTips containerLeft">
        <img src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>Log Out</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="leftArrow"></span>
        </div>
      </div>

      <!-- CONTAINER 06 -->
      <div class="containerTips containerRight">
        <img class="tipIcon" src="./img/hero.jpg" alt="icon" />
        <div class="textBox">
          <h2>E-Farming WS</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
            reiciendis dignissimos suscipit iusto?
          </p>
          <span class="rightArrow"></span>
        </div>
      </div>
    </section>

    <!-- STARTING THE FOOTER OF THE PAGE -->
    <footer class="footer">
      <div class="footerContainer">
        <div class="footerRow">
          <div class="footerColumn">
            <h4>E-Farming WS</h4>
            <ul>
              <li><a href="">About US</a></li>
              <li><a href="">Services</a></li>
              <!-- <li><a href="">Privacy Policy</a></li> -->
            </ul>
          </div>
          <div class="footerColumn">
            <h4>Help</h4>
            <ul>
              <li><a href="">Support</a></li>
              <li><a href="">Feedback</a></li>
              <!-- <li><a href="">Contacts</a></li> -->
            </ul>
          </div>
          <div class="footerColumn">
            <h4>Access</h4>
            <ul>
              <li><a href="./viewAddsFarmer.html">View Adds</a></li>
              <li><a href="../profile.html">User Profile</a></li>
              <li><a href="">Log Out</a></li>
            </ul>
          </div>
          <div class="footerColumn">
            <h4>Media</h4>
            <div class="mediaIcos">
              <a href=""><i class="fab fa-twitter"></i></a>

              <a href=""><i class="fab fa-facebook-f"></i></a>

              <a href=""><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <script src="../../js/toggleButton.js"></script>
</body>

</html>