<?php
namespace interfaces;

interface IGameInterface
{
    public function getTaskRightAnswer($task);
    public function isAnswerCorrect($userAnswer, $task);
}
