<?php
//Проверка баланса скобок в строке
$stringTest = "){{[gh]}}";

$result = isCorrect($stringTest);

echo $result == true ? "true" : "false" ;

function isCorrect($str) {
    $stack = "";

    for($i = 0; $i < strlen($str); $i++){
        switch ($str[$i]) {
            case "(":
            case "[":
            case "{":
                $stack .= $str[$i];
                break;
            case ")":
            case "]":
            case "}":
                if (
                    $stack[strlen($stack) - 1] == "(" && $str[$i] == ")" ||
                    $stack[strlen($stack) - 1] == "[" && $str[$i] == "]" ||
                    $stack[strlen($stack) - 1] == "{" && $str[$i] == "}"
                ){
                    $stack = substr($stack, 0, strlen($stack)-1);
                } else {
                    return false;
                }
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

