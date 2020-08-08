<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="includes/css/bootstrap.min.css">
    <title>PomfBoards - /everythinggoes/</title>
    <script>
      window.onload = () => {
        (function setupCharacterCount() {
          const MAX_LENGTH = 1000
          const inputEl = document.getElementById('text')
          const currentEl = document.getElementById('char-count')
          const maxEl = document.getElementById('max-count')

          maxEl.innerHTML = MAX_LENGTH

          inputEl.addEventListener('input', (evt) => {
            currentEl.innerHTML = evt.target.value.length
          })
        })()
      }
    </script>
  </head>
  <body>
  	<div class="container-fluid">
    <center><h1>/everythinggoes/</h1></center>
    <center><p>Alpha V.0.0.0.0.0.1 @ <a href="https://github.com/nokonoko/Pomf-Board">Github</a></p></center>
    <form action="api.php" method="POST">
    <form class="form-inline">
    <div class="form-group">
      <input type="name" class="form-control" id="name" name="name" placeholder="Anon">
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="5" id="text" name="text" placeholder="Max 1000 chars" maxlength="1000"></textarea>
    </div>
        <button type="submit" class="btn btn-default">Post!</button>
        <span>
          <span id="char-count">0</span>/<span id="max-count"></span>
        </span>
  </form><br>

	<?php
	if(PHP_ERRORS == 'true'){
  ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
  }
	require_once('includes/php/core.php');
	GetPost();
	?>
	</div>
	</body>
</html>