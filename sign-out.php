<?php
session_start();
# Destroy the session and return to homepage
session_destroy();
header('Location: index.php');

