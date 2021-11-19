<?php
if (isset ($_REQUEST['f']) && isset ($_REQUEST['hash'])) {
            $file = $_REQUEST['f'];
            $request = $_REQUEST['hash'];

            $hash = substr (md5 ($flag . $file . $flag), 0, 8);

            // WEBSEC{9abd8e8247cbe62641ff662e8fbb662769c08500} here  WEBSEC{9abd8e8247cbe62641ff662e8fbb662769c08500}

            if ($request == $hash) {
            show_source ($file);
            } else {
            echo 'Permission denied!';
            }
}
?>