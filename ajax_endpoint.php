<?php

require_once 'lib/ajax_methods.class.php';

header('Content-Encoding: application/json');

$ajaxMethods = new AjaxMethods();
try {
    $returner = call_user_method_array($_REQUEST['method'], $ajaxMethods, $_REQUEST['args']);
} catch (Exception $e) {
    $returner = array('error' => $e->message);
}

echo json_encode($returner);