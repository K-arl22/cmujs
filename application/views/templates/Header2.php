<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMU Journal of Science</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/fonts.css'); ?>">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/choices.min.css'); ?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/OverlayScrollbars.min.css'); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/style.default.css'); ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/custom.css'); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-inner">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
  <!-- User Profile Picture -->
        <div class="text-center">
          <img class="img-fluid rounded-circle avatar mb-3" src="<?= base_url('assets/images/users/' . $this->session->userdata('profile_pic')); ?>" alt="Profile Picture">
          <h2 class="h5 text-white text-uppercase mb-0"><?= $this->session->userdata('complete_name'); ?></h2>
          <p class="text-white">
            <?php 
              switch($this->session->userdata('role')) {
                case '1':
                  echo 'Admin';
                  break;
                case '2':
                  echo 'Researcher/User';
                  break;
                case '3':
                  echo 'Evaluator';
                  break;
                default:
                  echo 'User';
              }
            ?>
          </p>
        </div>
          <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="Users">
            <p class="h1 m-0">JS</p></a>
        </div>
        <!-- Sidebar Navigation Menus--><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
        <ul class="list-unstyled">                  
          <?php if ($this->session->userdata('role') == '1'): ?>
            <li class="sidebar-item"><a class="sidebar-link" href="#">
            <!-- <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url("Dashboards")?>">  -->
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#real-estate-1"> </use>
                </svg></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url("Users")?>"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Users</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url("Articles")?>"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Articles</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url("Volumes")?>"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#sales-up-1"> </use>
                </svg>Volumes</a></li>
          <?php elseif ($this->session->userdata('role') == '2'): ?>
            <li class="sidebar-item"><a class="sidebar-link" href="#"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#real-estate-1"> </use>
                </svg>Dashboards</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="Researcher"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Submit Article</a></li>
          <?php elseif ($this->session->userdata('role') == '3'): ?>
            <li class="sidebar-item"><a class="sidebar-link" href="#"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#real-estate-1"> </use>
                </svg>Dashboards</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="#"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Articles to Review</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header mb-5 pb-3">
        <nav class="nav navbar fixed-top">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center"><a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn" href="#">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                    <use xlink:href="#menu-1"> </use>
                  </svg></a><a class="navbar-brand ms-2" href="index.html">
                  <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span class="text-white fw-normal text-xs"> </span><strong class="text-primary text-sm"></strong></div></a></div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="<?php echo base_url("Auth/logout") ?>"> <span class="d-none d-sm-inline-block">Logout</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Breadcrumb-->
