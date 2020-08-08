<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="includes/css/bootstrap.min.css">
  <script src="includes/js/board.js"></script>
    <title>PomfBoards - /everythinggoes/</title>
  </head>
  <body>
    <div class="container-fluid">
    <center><h1>/everythinggoes/</h1></center>
    <center><p>Alpha V.0.0.0.0.0.1 @ <a href="https://github.com/nokonoko/Pomf-Board">GitHub</a></p>
      <p>Code changes live, so site might break sometimes, just reload.</p></center>
    <form action="api.php" method="POST">
    <form class="form-inline">
      <div class="form-group">
        <input type="name" class="form-control" id="name" name="name" placeholder="Anon">
      </div>
      <div class="form-group">
        <input maxlength="4" size="4" disabled id="char-count"></input>
        <textarea class="form-control" rows="5" id="text" name="text" placeholder="Max 1000 chars" maxlength="1000"></textarea>
      </div>
      <button type="submit" class="btn btn-default">Post!</button>
    </form><br>

  <?php
  require_once('includes/php/core.php');
  GetPost();
  ?>
  </div>
  </body>
</html>