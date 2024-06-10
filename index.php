<?php 
$conn = mysqli_connect("193.203.166.24", "u416836962_team1722", "Bzhi_Kurdistan@123", "u416836962_team1722");

try{
    //mysqli_query($conn, "INSERT INTO IP (IP) VALUES ('".$ip."')");
}catch(Exception $e){
    echo $e->getMessage();
}
?>
<?php
function getBrowserInfo() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Unknown Browser";
    $os = "Unknown OS";

    // Get the operating system
    if (preg_match('/linux/i', $userAgent)) {
        $os = 'Linux';
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        $os = 'Mac';
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        $os = 'Windows';
    }

    // Get the browser
    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browser = 'Internet Explorer';
    } elseif (preg_match('/Firefox/i', $userAgent)) {
        $browser = 'Mozilla Firefox';
    } elseif (preg_match('/Chrome/i', $userAgent)) {
        $browser = 'Google Chrome';
    } elseif (preg_match('/Safari/i', $userAgent)) {
        $browser = 'Apple Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browser = 'Netscape';
    }

    return array(
        'userAgent' => $userAgent,
        'browser' => $browser,
        'os' => $os
    );
}
$browserInfo = getBrowserInfo();
$sent_by = $_GET['param'];
$ip = $_SERVER["REMOTE_ADDR"];
$userAgent = $browserInfo['userAgent'];
$browser = $browserInfo['browser'];
$os = $browserInfo['os'];

try{
    mysqli_query($conn, "INSERT INTO IP (IP, User_Agents, Browser, OS, Sent_By) VALUES ('$ip', '$userAgent', '$browser', '$os', '$sent_by')");
}catch(Exception $e){

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Loading...
</body>
</html>