<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href=".././assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PFC
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../../admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../admin/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../admin/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          PFC
        </a>
        <a href="#" class="simple-text logo-normal">
          PakFitness Club
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li>
            <a href="./icons">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li> -->
          <li>
            <a href="./category">
              <i class="now-ui-icons location_map-big"></i>
              <p>Category</p>
            </a>
          </li>
          <li>
            <a href="./products">
              <i class="now-ui-icons location_map-big"></i>
              <p>Products</p>
            </a>
          </li>
          <li>
            <a href="./users">
              <i class="now-ui-icons location_map-big"></i>
              <p>Users</p>
            </a>
          </li>
          <li>
            <a href="./orders">
              <i class="now-ui-icons location_map-big"></i>
              <p>Orders</p>
            </a>
          </li>
          <li>
            <a href="./add_trainer">
              <i class="now-ui-icons location_map-big"></i>
              <p>Trainers</p>
            </a>
          </li>
          <li>
            <a href="./inventory">
              <i class="now-ui-icons location_map-big"></i>
              <p>Inventory</p>
            </a>
          </li>
          <li>
            <a href="./bookings">
              <i class="now-ui-icons location_map-big"></i>
              <p>Bookings</p>
            </a>
          </li>
          <li>
            <a href="./membership">
              <i class="now-ui-icons location_map-big"></i>
              <p>Memberships</p>
            </a>
          </li>
          <li>
            <a href="./membership_orders">
              <i class="now-ui-icons location_map-big"></i>
              <p>Membership Orders</p>
            </a>
          </li>
          <!-- <li>
            <a href="./bookings">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Bookings</p>
            </a>
          </li> -->
          <!-- <li>
            <a href="./user">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li> -->
          <!-- <li class="active-pro">
            <a href="./upgrade">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../core/actions.php?signout=1">Logout</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>