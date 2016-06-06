<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 02.06.2016
 * Time: 08:21
 */

// Now following: The body area of the page
$region = strtolower($uri[3]);
$MATCHID = strtolower($uri[4]);
$imgPath = "http://localhost/leagueAnalyst/img/";
$imgItemPath = "http://ddragon.leagueoflegends.com/cdn/6.11.1/img/item/";
$game = json_decode(file_get_contents("https://".$region.".api.pvp.net/api/lol/".$region."/v2.2/match/".$MATCHID."?api_key=".$apikey), true);

require_once("./lib/GameConstantsHandler.php");
$GCH = new GameConstantsHandler();
?>
<link href="matchhistory.css" type="text/css" rel="stylesheet">
<div id="page_content">
    <div class="header">
        <h1>
            <?php echo $GCH->getQueueTypeName($game["queueType"]) . ", " . $GCH->getRegionName($game["region"]); ?>
        </h1>
    </div>
    <div class="statBoard">
        <table border="1px solid grey;" cellspacing="0" cellpadding="2">

<?php
    $playerboards=[];
    for($i=0;$i<=9;$i++)
    {
        $p1 = $game["participants"][$i];
        $p1Ident = $game["participantIdentities"][$i];
        $playerboards[$i]["name"] = $p1Ident["player"]["summonerName"];
        $playerboards[$i]["data"] = $p1;
    }

for($i=0;$i<5;$i++)
{
    echo "<tr>";

    echo "<td rowspan='2'><img src='".$imgPath . "/squares/" . $playerboards[$i]["data"]["championId"] . ".png' height='50px' width='50px'></td>";
    echo "<td><img src='".$imgPath . "/summspells/" . $playerboards[$i]["data"]["spell1Id"] . ".png' width='25px' height='25px'></td>";

    echo "<td rowspan='2'><strong>".$playerboards[$i]["name"]."</strong></td>";
    //onError="this.src='imagefound.gif';"

    echo "<td>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item0"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item1"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item2"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
    </td>";


    echo "<td rowspan='2'>" . $playerboards[$i]["data"]["stats"]["minionsKilled"] . " CS</td>";
    $kda = round(($playerboards[$i]["data"]["stats"]["assists"] + $playerboards[$i]["data"]["stats"]["kills"])/$playerboards[$i]["data"]["stats"]["deaths"],2);

    if($kda < 1) {
        $kda = "<span style='color:red'>" . $kda . "</span>";
    } else if($kda < 4) {
        $kda = "<span style='color:green'>" . $kda . "</span>";
    } else {
        $kda = "<span style='color:orange;font-weight: bold;'>" . $kda . "</span>";
    }


    echo "<td rowspan='2'>
    ".$playerboards[$i]["data"]["stats"]["kills"]."/
    ".$playerboards[$i]["data"]["stats"]["deaths"]."/
    ".$playerboards[$i]["data"]["stats"]["assists"]." - ".$kda." KDA
</td>";

    // SPACER
    if($i==0) {
        echo "<td rowspan='11'> <h2>VS</h2> </td>";
    }
    $i+=5;
    $kda = round(($playerboards[$i]["data"]["stats"]["assists"] + $playerboards[$i]["data"]["stats"]["kills"])/$playerboards[$i]["data"]["stats"]["deaths"],2);

    // PLAYER 2
    if($kda < 1) {
        $kda = "<span style='color:red'>" . $kda . "</span>";
    } else if($kda < 4) {
        $kda = "<span style='color:green'>" . $kda . "</span>";
    } else {
        $kda = "<span style='color:orange;font-weight: bold;'>" . $kda . "</span>";
    }
    echo "<td rowspan='2'>
    ".$playerboards[$i]["data"]["stats"]["kills"]."/
    ".$playerboards[$i]["data"]["stats"]["deaths"]."/
    ".$playerboards[$i]["data"]["stats"]["assists"]." - ".$kda." KDA
</td>";


    echo "<td rowspan='2'>" . $playerboards[$i]["data"]["stats"]["minionsKilled"] . " CS</td>";


    echo "<td>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item0"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item1"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item2"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
    </td>";





    echo "<td rowspan='2'><strong>".$playerboards[$i]["name"]."</strong></td>";
    echo "<td><img src='".$imgPath . "/summspells/" . $playerboards[$i]["data"]["spell1Id"] . ".png' width='25px' height='25px'></td>";
    echo "<td rowspan='2'><img src='".$imgPath . "/squares/" . $playerboards[$i]["data"]["championId"] . ".png' height='50px' width='50px'></td>";

    // End Player 2

    $i-=5;




    echo "</tr><tr><td>
<img src='".$imgPath . "/summspells/" . $playerboards[$i]["data"]["spell2Id"] . ".png' width='25px' height='25px'>
</td>";


    echo "<td>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item3"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item4"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i]["data"]["stats"]["item5"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
    </td>";


    echo "<td>
<img src='".$imgItemPath . $playerboards[$i+5]["data"]["stats"]["item3"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i+5]["data"]["stats"]["item4"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
<img src='".$imgItemPath . $playerboards[$i+5]["data"]["stats"]["item5"] . ".png' width='25px' height='25px' onError='this.src=\"http://fs5.directupload.net/images/160602/gntez3mx.jpg\";'>
    </td>";

    echo "<td>
<img src='".$imgPath . "/summspells/" . $playerboards[$i+5]["data"]["spell2Id"] . ".png' width='25px' height='25px'>
</td></tr>";





}
if($game["teams"][0]["winner"]) {
    echo "<tr><td style='color:green;text-align: center;' colspan='6'><h2>Win</h2></td><td style='color:red;text-align: center;' colspan='6'><h2>Lose</h2></td></tr>";
} else {
    echo "<tr><td style='color:red;text-align: center;' colspan='6'><h2>Lose</h2></td><td style='color:green;text-align: center;' colspan='6'><h2>Win</h2></td></tr>";
}
?>
        </table>
    </div>
</div>
<br><br><br><hr>
<?php var_dump($game) ?>