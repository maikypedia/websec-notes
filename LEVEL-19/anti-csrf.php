<?php

function init_token() {
    if ((! isset ($_SESSION['token'])) or empty ($_SESSION['token'])) {
        $_SESSION['token'] = generate_random_text (32);
    }
}

function check_and_refresh_token() {
    if (! isset ($_POST['token'])) {
        die ('Please sumbit the anti-csrf token.');
    } elseif ( hash_equals ($_SESSION['token'], $_POST['token'])) {
        $_SESSION['token'] = generate_random_text (32);
    } else {
        $_SESSION['token'] = generate_random_text (32);
        die ('Invalid session token.');
    }
}
?>