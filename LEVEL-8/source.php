<!DOCTYPE html>
<html>
<head>
    <title>#WebSec Level Eight</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css" />
</head>
    <body>
        <div id="main">
            <div class="container">
                <div class="row">
                    <h1>Level Eight <small> - Bypass Security Features </small></h1>
                </div>
                <div class="row">
                    <p class="lead">
                        This is our neat image-dumper service, that only allows <a href='https://en.wikipedia.org/wiki/GIF'>GIF</a>.<br>
                        You can check its source code <a href='source.php'>here</a> if you don't believe us.
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" class='form-inline'>
                        <div class='form-group'>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <p class="help-block">Select image (.gif only) to upload</p>
                        </div>
                            <div class='form-group'>
                            <input class='btn btn-default' type="submit" value="Upload Image" name="submit">
                        </div>
                    </form>
                </div>    
                <?php if (isset ($_FILES) && !empty ($_FILES)): ?>
                <div class="row">
                <?php
                    $uploadedFile = sprintf('%1$s/%2$s', '/uploads', sha1($_FILES['fileToUpload']['name']) . '.gif');

                    if (file_exists ($uploadedFile)) { unlink ($uploadedFile); }

                    if ($_FILES['fileToUpload']['size'] <= 50000) {
                        if (getimagesize ($_FILES['fileToUpload']['tmp_name']) !== false) {
                            if (exif_imagetype($_FILES['fileToUpload']['tmp_name']) === IMAGETYPE_GIF) {
                                move_uploaded_file ($_FILES['fileToUpload']['tmp_name'], $uploadedFile);
                                echo '<p class="lead">Dump of <a href="/level08' . $uploadedFile . '">'. htmlentities($_FILES['fileToUpload']['name']) . '</a>:</p>';
                                echo '<pre>';
                                include_once($uploadedFile);
                                echo '</pre>';
                                unlink($uploadedFile);
                            } else { echo '<p class="text-danger">The file is not a GIF</p>'; }
                        } else { echo '<p class="text-danger">The file is not an image</p>'; }
                    } else { echo '<p class="text-danger">The file is too big</p>'; }
                ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </body>
</html>