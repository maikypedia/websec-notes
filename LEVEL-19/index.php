<?php
session_start ();

include 'random.php';
include 'email.php';
include 'anti_csrf.php';
include 'captcha.php';

init_token ();

if (isset ($_POST['captcha']) and isset ($_SESSION['captcha'])) {
    if ($_SESSION['captcha'] === $_POST['captcha']) {
        check_and_refresh_token();
        $email_addr = 'level19' . '@' . $_SERVER['HTTP_HOST'];  // less hassle if we move to another domain
        send_flag_by_email ($email_addr);
        $message = "<p class='alert alert-success'>Password recovery email sent.</p>";
    } else {
        $message = "<p class='alert alert-danger'>Invalid captcha</p>";
    }
} else {
    $_SESSION['captcha'] = generate_random_text (255 / 10.0);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>#WebSec Level Nineteen</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css" />
    <!-- Many thanks to @nurfed for testing and _greatly_ improving this level <3 -->
</head>
    <body>
        <div id="main">
            <div class="container">
                <div class="row">
                    <h1>Level Nineteen <small> - Password reset</small></h1>
                </div>
                <div class="row">
                    <p class="lead">
                         This application emails the flag to <mark>level19@websec.fr</mark>,
                         in case it was forgotten.<br>
                         Since we don't discriminate against Tor users,
                         everyone gets a <i>clownflare-style</i><br>
                         captcha (to protect us against hackers).

                        <br><br>
                        
                        Here are the sources for the <a href="./source1.php">index</a>,
                        the <a href="./source2.php">captcha</a>,
                        the <a href="./source3.php">anti-csrf</a>,
                        and the <a href="./source4.php">prng</a>.
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <label for="user_id">Have you forgotten your password?</label>
                    <div>
                    <img src="data:image/png;base64,<?php echo show_image ()?>" alt="captcha image" style="filter: blur(.1px);">
                    </div>
                    <br>
                    <form name="username" method="post" class="form-inline">
                        <div class="form-group">
                            <input type="input" class="form-control col-md-4" id="captcha" name="captcha" placeholder="captcha" required>
                            <input type="submit" class="form-control btn btn-default col-md-4" placeholder="Submit!" name="submit">
                            <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>">
                        </div>
                    </form>
                </div>
            </div>
<?php if (isset ($message)): ?>
            <br><div class="container"> <div class="row"><?php echo $message; ?></div></div>
<?php endif; ?>
        </div>
    </body>
</html>