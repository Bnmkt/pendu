<?php

$datas =[
        "triedLetters"=>$triedLetters,
        "wordIndex"=>$wordindex
    ...
]

setcookie("pendu", encode($datas), time()+60*60);


?>
<html>
    <body>
        <?= $_COOKIE["test"]; ?>
    </body>
</html>
