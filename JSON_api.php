<?php
/**
 * Created by PhpStorm.
 * User: jibba_000
 * Date: 24-11-2017
 * Time: 08:52
 */
?>

<?php

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/')); //trims for space and other characters
//$input = json_decode(file_get_contents('php://input'),true);

// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'progexam_1');
mysqli_set_charset($link,'utf8');

// retrieve the table and key from the path
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request);


// create SQL based on HTTP method
switch ($method) {
    case 'GET':
        $sql = "select * from `$table`"; break;
}

// excecute SQL statement
$result = mysqli_query($link,$sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error());
}

// print results, insert id or affected row count
if ($method == 'GET') {
    if (!$key) echo '[';
    for ($i=0;$i<mysqli_num_rows($result);$i++) {
        echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$key) echo ']';
}
// close mysql connection
mysqli_close($link);
