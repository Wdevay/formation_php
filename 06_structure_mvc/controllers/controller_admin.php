<?php
if (!isset($_SESSION['user'])) {
    header("Location: ?page=login");
}
if (!in_array('ROLE_ADMIN', json_decode($_SESSION['user']['roles']))) {
    header("Location: ?page=home");
}


include "./views/base.phtml";