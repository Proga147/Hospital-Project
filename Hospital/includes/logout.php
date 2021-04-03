<?php
session_start();
session_unset();  //unset the session
session_destroy(); //destroy the session variables
header('Location: ../index');  //redirect to home page
