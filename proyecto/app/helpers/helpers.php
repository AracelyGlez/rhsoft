<?php
function redirigir($url) {
    header("Location: " . URLROOT . $url);
    exit();
}