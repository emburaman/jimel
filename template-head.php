<!DOCTYPE html>
<html lang="en" ng-app="JimelApp">
  <head>
		<title></title>
		<meta charset="UTF-8">

    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/0.7.1/angular-material.min.css">
    <link rel="stylesheet" href="css/materialdesignicons.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body layout="column" ng-controller="AppCtrl">

  	<!-- Top Header -->
    <md-toolbar layout="row">
      <button ng-click="toggleSidenav('left')" class="menuBtn">
        <span class="visually-hidden">Menu</span>
      </button>
      <p class="toolbar-title">Jimel</p>
    </md-toolbar>

    <div layout="row" flex>
    	<!-- Side Navigation -->
      <md-sidenav class="md-sidenav-left md-whiteframe-z2" md-component-id="left">
        <!-- Login/Logout User Bar -->
        <div class="account-box">
          <?php 
          if (!isset($_SESSION['jimel']['userid'])) {
          ?>
          <md-toolbar class="md-theme-indigo logged-out" ng-controller="LeftCtrl">
            <div class="buttons">
              <md-button ng-click="close()" class="">
                <i class="mdi mdi-arrow-left"></i>
              </md-button>
              <md-button><a href="/entrar"><i class="mdi mdi-login"></i></a></md-button>
            </div>
          </md-toolbar>

          <?php } else { ?>
          <md-content class="logged-in" ng-controller="LeftCtrl" style="background-image: url('<?php echo $_SESSION['jimel']['photo_path']; ?>')">
            <div class="buttons">
              <md-button ng-click="close()" class="">
                <i class="mdi mdi-arrow-left"></i>
              </md-button>
              <md-button><a href="/sair"><i class="mdi mdi-logout"></i></a></md-button>
              <md-button><a href="/editarmeuperfil"><i class="mdi mdi-pencil"></i></a></md-button>
            </div>
          </md-content>
          <md-toolbar class="md-theme-indigo">
            <h3 class="md-toolbar-tools user-name"><?php echo $_SESSION['jimel']['full_name']; ?></h3>
          </md-toolbar>
          <?php } ?>
        </div>

          
          <p hide-md show-gt-md>
            This sidenav is locked open on your device. To go back to the default behavior,
            narrow your display.
          </p>
        </md-content>
      </md-sidenav>

      <!-- Main Content Area -->
      <div layout="column" flex id="content">
        <md-content layout="column" flex class="md-padding">
