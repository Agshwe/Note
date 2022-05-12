
<?php

$name="ko";
$age=20;
$fruit=["apple","orange","banana"];

function drive(){
    global $name;
    return $name."can drive"; // $name ကို return နဲ့ခေါချင်ရင် global အရင် ကြေငြာခဲ့ရတယ်။
}

echo drive();

?> 

