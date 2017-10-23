<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Тестовое задание - комментарии</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/html/css/bootstrap.css" rel="stylesheet">
    <link href="/html/css/style.css" rel="stylesheet">    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse" role="navigation"><!--Верхняя панель-->
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          <a class="navbar-brand" href="/view/">Комментарии</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar">
          <ul class="nav nav-pills  navbar-nav navbar-right">
            <ul class="nav nav-pills">
              <li><a href="/view/">Все комментарии</a></li>
              <li><a href="/comment/">Добавить комментарий</a></li>
              <li><a href="/stat/">Статистика</a></li>
            </ul>             
          </ul>          
        </div>
      </div>
    </nav>
