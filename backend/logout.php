<?php
session_start();
session_destroy();
header('Location: ../Public/login.php');
exit;
