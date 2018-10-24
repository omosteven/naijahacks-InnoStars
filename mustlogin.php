<?php
if (!isset($_SESSION['fullName'])) {
  header('Location: login.html');
}