<html>
    <head>
        <title>LeagueAnalyst - Analyze League of Legends Games, Profiles or Statistics!</title>
    </head>
    <body>
<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
$apikey = "9a8d772e-fffe-4f9a-ad87-adadbaf80142";
switch($uri[2]){
    case "matchhistory":
        require_once("/pages/matchhistory.php");
        break;
    /*case "post":{
        $postId = $uri[2];
        require_once("post.php");
        break;
    }
    default:{
        require_once("default.php");
        break;
    }*/
}
?>
    </body>
</html>
