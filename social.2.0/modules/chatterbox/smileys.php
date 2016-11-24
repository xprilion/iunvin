<?php
function smiley($textu){
$smileys = array(
';)' => 'wink',
':|' => 'straight',
':(' => 'sad',
':D' => 'grin',
':-/' => 'confused',
':-*' => 'kiss',
'B)' => 'cool',
':P' => 'tongue',
'}:-)' => 'devil',
':)' => 'happy',
'<3' => 'love',
':yo:' => 'agreement',
'\m/' => 'celebrate',
':party:' => 'celebrate',
'XO' => 'hug',
':OMG:' => 'surprise',
':adoo:' => 'sympathy',
':punch:' => 'fighting',
':(' => 'crying',
':blush:' => 'blush',
':snooze:' => 'sleepy',
':()' => 'yawn',
':S' => 'worried',
':nerd:' => 'nerd',
':hi:' => 'hi',
':lol:' => 'grin',
':rofl:' => 'rofl',
':call:' => 'call',
':yes:' => 'yes',
':no:' => 'no',
':Y:' => 'thumbup',
':N:' => 'thumbdown',
'O:-)' => 'angel',
':makeup:' => 'makeup',
':clap:' => 'clap',
'</3' => 'brokenheart',
':mail:' => 'mail',
':f:' => 'flower',

':rain:' => 'rain',
':time:' => 'time',
':music:' => 'music',
':phone:' => 'phone',
':coffee:' => 'coffee',
':muscle:' => 'muscle',
':beer:' => 'beer',
':drink:' => 'drink',
':dance:' => 'dance',
':*:' => 'star',    );

    foreach($smileys as $smiley => $img){
        $textu = str_replace(    
            $smiley,
            "<img src='chatterbox/smileys/{$img}.gif' />",
            $textu
        );
    }
    return $textu;
}

?>
