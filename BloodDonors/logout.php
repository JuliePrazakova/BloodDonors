<?php
//destroy of session in order to logout
session_start();
session_unset();
session_destroy();
header("Location: ../maturita/hospital.php");