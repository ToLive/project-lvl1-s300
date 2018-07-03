<?php

namespace Games\CalcGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;
    
function run()
{
    $rulesStr = 'What is the result of the expression?';
    
    $taskGenFunc = function () {
        $operArray = array('+', '-', '*');
        
        return implode(' ', array(rand(0, 100), $operArray[rand(0, 2)], rand(0, 100)));
    };
    
    $answerCheckFunc = function ($taskStr) {
        $task = explode(' ', $taskStr);
        
        $left = $task[0];
        $right = $task[2];
        $operator = $task[1];
        
        $result = null;
        
        switch ($operator) {
            case "+":
                $result = $left + $right;
                break;
            case "-":
                $result = $left - $right;
                break;
            case "*":
                $result = $left * $right;
                break;
            default:
                break;
        }
        
        return $result;
    };
    
    startGame($rulesStr, $taskGenFunc, $answerCheckFunc);
}
