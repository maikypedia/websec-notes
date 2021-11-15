<?php
if (!isset($_GET['page'])) {
  header('Location: http://websec.fr/level25/index.php?page=main');
  die();
}
?>
<!DOCTYPE html>
<!-- A smooth level by kkadosh -->
<html>
<head>
  <title>#WebSec Level TwentyFive</title>
  <link rel='stylesheet' href='../static/bootstrap.min.css' />
</head>
  <body>
      <div id='main'>
          <div class='container'>
              <div class='row'>
                  <h1>LevelTwentyFive</h1>
              </div>
              <div class='row'>
                  <p class='lead'>
                        You can <cite>include any page so long as it is <s>black</s> not the <code>flag.txt</code> one</cite>. As usual, the source code is <a href='source.php'>free</a>.<br>
                  </p>
                    <!--
                        Yeah, the webserver is configured so that you can't directly access .txt files :)
                        And no, PHP wrappers aren't the only way to have fun!
                    -->
              </div>
          </div>
          <div class='container'>
              <div class='row'>
                  <label for='user_id'>Enter the page you want to include:</label>
                  <form name='username' method='get'>
                      <div class='form-group col-md-2'>
                          <input type='text' class='form-control' id='page' name='page' value='main' required>
                      </div>
                      <div class='col-md-2'>
                          <input type='submit' class='form-control btn btn-default' name='send'>
                      </div>
                  </form>
              </div>
            <p class='well'>
                  <?php
                  parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $query);
                  foreach ($query as $k => $v) {
                      if (stripos($v, 'flag') !== false)
                          die('You are not allowed to get the flag, sorry :/');
                  }

                  include $_GET['page'] . '.txt';
                  ?>
        </p>
          </div>
      </div>
  </body>
</html>