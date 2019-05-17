<?php

$stringTest = "{{[gh])}}";

$result = isCorrect($stringTest);

echo $result == true ? "true" : "false" ;

function isCorrect($str) {
    $stack = "";

    for($i = 0; $i < strlen($str); $i++){
        switch ($str[$i]) {
            case "(":
                $stack .= "(";
                break;
            case "[":
                $stack .= "[";
                break;
            case "{":
                $stack .= "{";
                break;
            case ")":
                if ($stack[strlen($stack) - 1] == "(") {
                    $stack = substr($stack, 0, strlen($stack)-1);
                }
                else {
                    return false;
                }
                break;
            case "]":
                if ($stack[strlen($stack) - 1] == "[") {
                    $stack = substr($stack, 0, strlen($stack)-1);
                }
                else return false;
                break;
            case "}":
                if ($stack[strlen($stack) - 1] == "{") {
                    $stack = substr($stack, 0, strlen($stack)-1);
                }
                else return false;
                break;
        }
    }

    if (strlen($stack) == 0){
        return true;
    }
    else{
        return false;
    }
}

?>

