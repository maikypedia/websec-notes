<!-- Yet an other fine level, based on a real-world vuln discovered by @caillou -->
<?php

// Defines $flag
include 'flag.php';

$db = new PDO('sqlite::memory:');
$db->exec('CREATE TABLE users (
  user_id   INTEGER PRIMARY KEY,
  user_name TEXT NOT NULL,
  user_privileges INTEGER NOT NULL,
  user_password TEXT NOT NULL
)');

$db->prepare("INSERT INTO users VALUES(0, 'admin', 0, '$flag');")->execute();

for($i=1; $i<25; $i++) {
  $pass = md5(uniqid());
  $user = "user_" . substr(crc32($pass), 0, 2);
  $db->prepare("INSERT INTO users VALUES($i, '$user', 1, '$pass');")->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>#WebSec Level Thirteen</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css" />
</head>
    <body>
        <div id="main">
            <div class="container">
                <div class="row">
                    <h1>LevelThirteen <small> - A privilege offer</small></h1>
                </div>
                <div class="row">
                    <p class="lead">
                                            A simple tool to display privileges, so you can check them.
                                            As usual, the source code can be found <a href="source.php">here</a>.
                    </p>
                </div>
            </div>
            <div class="container">
              <div class="row">
                <form class="form-inline" method='get'>
                                    Ids to display
                  <input name='ids' class='form-control' type='text' value='1,2,3'>
                  <input class="form-control btn btn-default" name="submit" value='Go' type='submit'>
                </form>
              </div>

<?php
if (isset($_GET['ids'])) {
    if ( ! is_string($_GET['ids'])) {
        die("Don't be silly.");
    }

    if ( strlen($_GET['ids']) > 70) {
        die("Please don't check all the privileges at once.");
    }

  $tmp = explode(',',$_GET['ids']);

  
  for ($i = 0; $i < count($tmp); $i++ ) {
        $tmp[$i] = (int)$tmp[$i];
        if( $tmp[$i] < 1 ) {
            unset($tmp[$i]);
        }
  }

  $selector = implode(',', array_unique($tmp));

  $query = "SELECT user_id, user_privileges, user_name
  FROM users
  WHERE (user_id in (" . $selector . "));";

  $stmt = $db->query($query);

    echo '<br>';
    echo '<div class="well">';
  echo '<ul>';
  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        echo "<li>";
        echo "User <em>" . $row['user_name'] . "</em>";
      echo "    with id <code>" . $row['user_id'] . '</code>';
        echo " has <b>" . ($row['user_privileges'] == 0?"all":"no") . "</b> privileges.";
        echo "</li>\n";
  }
    echo "</ul>";
    echo "</div>";
}
?>
            </div>
        </div>
    </body>
</html><