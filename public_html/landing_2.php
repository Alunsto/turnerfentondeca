<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TFSS DECA | Landing</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,800" rel="stylesheet">

  <!--CSS FILES-->
  <!-- Page CSS -->
  <link href="css/landing_2.css" rel="stylesheet">
  <link href="css/grid.css" rel="stylesheet">

  <!--JavaScript Files-->


</head>

<body>
  <a href="landing"><img id="navbar-logo" src="img/deca_logo_small_letters.png" /></a>
  <nav id="navbar">
    <ul>
      <li><a href="" class="active">Landing</a></li>
      <li><a href="login">Sign in</a></li>
      <li><a href="register">Register</a></li>
      <li><a href="reset_password">Account Recovery</a></li>
    </ul>
  </nav>

  <div class="container-fluid" id="landing-container">

      <div class="landing-content-container-margins">


        <div class="landing-content left">
          <img src="img/deca_logo_large_circle_light.png" align="middle" id="landing-centre-logo"></img>
          <h1 class="landing-text">Turner Fenton DECA is the largest club at Turner Fenton, and the most competitive DECA chapter to date.</h1>
        </div>


        <div class="landing-content right">
          <div class="row">

            <div class="col-7">
            <div class="landing-menu-option">
              <a href="login">
                <img src="img/emblem_login.png" class="emblem-div" width="65px" />
              </a>
                <h2 class="landing-text emblem-title">Sign In</h2>
              <p>
                &nbsp&nbsp
                Sign in to access your dashboard and complete any required administrative tasks.
              </p>
                <a href="login"><button class="btn btn-outline">Sign In</button></a>
            </div>
              <div class="landing-menu-option">
                <a href="exam">
                  <img src="img/emblem_exam.png" class="emblem-div" width="65px" />
                </a>
                  <h2 class="landing-text emblem-title">Try an Exam</h2>
                <p>
                  &nbsp&nbsp
                  Spruce up your exam skills in preparation for competition, without the need to sign in!
                  <br />
                  <i>Note: Your exam score will not be recorded if you don't sign in</i>
                </p>
                  <a href="exam"><button class="btn btn-outline">Start Exam</button></a>
              </div>
              <div class="landing-menu-option">
                <a href="team">
                  <img src="img/emblem_team.png" class="emblem-div" width="65px" />
                </a>
                  <h2 class="landing-text emblem-title">Meet the Team</h2>
                <p>
                  &nbsp&nbsp
                  See the 2016 - 2017 TFSS DECA executive team, and their positions.
                </p>
                  <a href="team"><button class="btn btn-outline">Meet the Team</button></a>
              </div>
            </div>

            <div class="col-5">
              <div class="landing-info-option">
                <a href="login">
                  <img src="img/google-noto.jpg" class="" width="100%" />
                  <h2 class="landing-text emblem-title" style="text-align:center">Sign In</h2>
                </a>
                <p>
                  &nbsp&nbsp
                  <i>A typeface five years in the making, Google Noto spans more than 100 writing systems, 800 languages, and hundreds of thousands of characters for users worldwide</i>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>

  </div>
</body>

</html>
