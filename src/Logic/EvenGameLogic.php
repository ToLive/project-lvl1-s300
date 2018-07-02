<?php
namespace Logic\EvenGameLogic;

function getTaskRightAnswer($task)
{
    return $task % 2 == 0 ? "yes" : "no";
}

function isAnswerCorrect($userAnswer, $task)
{
    return (getTaskRightAnswer($task) == $userAnswer);
}
