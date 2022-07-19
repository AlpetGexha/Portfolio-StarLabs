<?php

if (Session::has('success')) {
    echo '<span style="color: green" "><strong>' . Session::flash('success') . '</strong></span>';
}
?>


<?php
if (Session::has('error')) {
    echo '<span style="color: red" "><strong>' . Session::flash('error') . '</strong></span>';
}
?>
