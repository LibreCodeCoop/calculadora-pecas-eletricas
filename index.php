<?php

switch ($_SERVER['REQUEST_URI']) {
    case '/calculate':
        require 'src/view/form.php';
        // require_once 'src/view/rele.php';
        break;
    
    default:
        require 'src/view/form.php';
        break;
}
