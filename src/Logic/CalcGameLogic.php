<?php
namespace Logic\CalcGameLogic;

function getTaskRightAnswer($task)
{
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
}

function isAnswerCorrect($userAnswer, $task)
{
    return (getTaskRightAnswer($task) == $userAnswer);
}
