<?php include "flag.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>#WebSec Level Ten</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css"/>
</head>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <h1>LevelTen<small> - Awesome File Downloader.</small></h1>
        </div>
        <div class="row">
            <p class="lead">
        Here we have a <a href="source.php">cool file downloader</a>. It allows you to download arbitrary files, even <mark>flag.php</mark>,
        as long as it's a legit request!<br>
                Thanks to an <mark>anonymous contributor</mark> for this challenge.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form name="username" method="post" class="form-inline">
                    <div class="form-group">
                        <label for="f">File</label>
                        <span class='text-success'></span>
                        <input type="text" class="form-control" required id="f" value="index.php" name="f">
                    </div>
                    <div class="form-group">
                        <label for="hash">Secret hash</label>
            <input type="text" class="form-control" required id="hash" value="<?php echo substr (md5 ($flag . 'index.php' . $flag), 0, 8); ?>" name="hash" >
                    </div>
                <button type="submit" class="btn btn-default">Get!</button>
            </form>
        </div>
        <?php
        if (isset ($_REQUEST['f']) && isset ($_REQUEST['hash'])) {
            $file = $_REQUEST['f'];
            $request = $_REQUEST['hash'];

            $hash = substr (md5 ($flag . $file . $flag), 0, 8);

            echo '<div class="row"><br><pre>';
            if ($request == $hash) {
            show_source ($file);
            } else {
            echo 'Permission denied!';
            }
            echo '</pre></div>';
        }
        ?>
    </div>
</div>
<link rel="stylesheet" href="../static/bootstrap.min.js"/>
</body>
</html>