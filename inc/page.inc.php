<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo isset($page_description) ? $page_description : $DEFAULT_PAGE_DESCRIPTION; ?>">
    <meta name="author" content="Timo Denk">
    <link rel="icon" href="/img/favicon.ico">

    <title><?php echo (isset($page_title) ? $page_title . ' - ' : '') . $DEFAULT_PAGE_TITLE; ?></title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/custom.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">tools.timodenk.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php if ($p == 'home') echo ' class="active"'; ?>><a href="/">Home</a></li>
            <li<?php if ($p == 'about') echo ' class="active"'; ?>><a href="/?p=about">About</a></li>
            <li<?php if ($p == 'contact') echo ' class="active"'; ?>><a href="/?p=contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <?php
        if ($tool_page_requested) {
          echo isset($page_title) ? '<h1>' . $page_title . '</h1>' : '';
          echo isset($page_description) ? '<p class="lead">' . $page_description . '</p>' : '';
          require('page/content/' . $p . '.php');
        } else {
          require('special-page/' . $p . '.php');
        }
      ?>

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; <a href="http://www.timodenk.com/" target="_blank">Timo Denk</a></p>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>

    <?php
      // require javascript of tool pages
      if ($tool_page_requested) {
        // logic script
        if (file_exists('page/logic/' . $p . '.js')) { 
          echo '<script src="/page/logic/' . $p . '.js"></script>'; 
        }

        // adapter script
        if (file_exists('page/adapter/' . $p . '.js')) { 
          echo '<script src="/page/adapter/' . $p . '.js"></script>'; 
        }
      }
    ?>

    <!-- analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-37082212-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
