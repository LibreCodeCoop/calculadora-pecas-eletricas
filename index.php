<?php
switch ($_SERVER['REQUEST_URI']) {
    case '/rele':
        require_once 'src/view/rele.php';
        break;
    
    default:
        require_once 'src/view/index.php';
        break;
}
