<?php
session_start();
include_once 'includes/dbh.inc.php';


$indexSql = "SELECT * from bookinfo where PublisherName='Sheba Publisher' limit 0,2";
$indexSqlData = mysqli_query($conn, $indexSql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Nayeem, Nasib" />

  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Welcome to BoiMela Online Service</title>
  <!-- -css files- -->
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/index1.css" />

  <!-- js files -->

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/index1.js"></script>
</head>

<body>
  <!-- <div class="container"> -->
  <header class="header-area">
    <!---header area starts----->
    <div class="logo-bar">
      <!---logo area starts----->


      <div class="logo"><a href="index1.html">BookFinder</a></div>
      <div class="signin text-right">
        <?php
        if (isset($_SESSION['u_uid'])) {
          $user = $_SESSION['u_uid'];
          $query = "SELECT * FROM users Where u_uid = '$user';";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($result);
          $userName = $row['user_uid'];
          echo $userName;

          echo '<a href="#" class="btn btn-outline-danger">username</a>
        <a href="includes/logout.inc.php" class="btn btn-outline-dark">Logout</a>';
        } else {
          echo ' <a href="login.php" class="btn btn-outline-dark "> Login</a>
        <a href="registration.php" class="btn btn-outline-dark"> Register</a>';
        }


        ?>

      </div>
    </div>
    <!-------logo area ends----->
    <?php
    include('includes/header.inc.php');
    ?>

  </header>
  <!---header area ends----->



  <div id="particles-js">
    <div class="particle-overlay"></div>
  </div>

  <div class="container1">



    <!-- sheba prokashoni books starts -->
    <div class="sciencefiction">
      <div class="sfbooks-title">
        <h3>সেবা প্রকাশনী এর বই সমূহ</h3>
        <a class="btn btn-outline-dark" href="ShopProfile.php?page=ShebaProkashoni">View All</a>
      </div>
      <div class="sfbooks-list owl-carousel">
        <?php while ($row = mysqli_fetch_assoc($indexSqlData)) { ?>
        <div class="sfbook1">
          <div class="sfbook1-content">
            <a href="bookDetails.php?page=bookDetails&ID=<?php echo $row['id'] ?>"><img src="<?php echo $row['BookImage'] ?>" alt="<?php echo $row['BookName'] ?>" />
              <h4><?php echo $row['BookName'] ?></h4>
              <p><?php echo $row['AuthorName'] ?></p>
            </a>
          </div>

        </div>
        <?php } ?>
      </div>
    </div>
    <!-- sheba prokashoni books ends -->


  </div>
  <script src="js/particles.min.js"></script>
  <script>
    particlesJS.load('particles-js', 'js/particles.json', function() {
      console.log('particles.json loaded..');
    });
  </script>
</body>

</html>