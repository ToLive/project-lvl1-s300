<?php

namespace Logic\GameEngine;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_TO_WIN = 3;
   
function startGame($rulesStr, $taskGenFunc, $answerCheckFunc)
{
    line('Welcome to the Brain Game!');
    
    //line('Answer "yes" if number even otherwise answer "no".');
    line($rulesStr);

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
        
    $isGameOver = false;
    
    for ($i = 0; $i < ANSWERS_TO_WIN; $i += 1) {
        $userTask = $taskGenFunc();
    
        line("Question: " . $userTask);
    
        $userAnswer = prompt('Your answer: ');
        $rightAnswer = $answerCheckFunc($userTask);
    
        if ($rightAnswer != $userAnswer) {
            $isGameOver = true;
            break;
        }
        
        line("Correct!");
        line();
    }
    
    if ($isGameOver) {
        userLoose($userAnswer, $rightAnswer, $userName);
    } else {
        userWin($userName);
    }
}

function userLoose($userAnswer, $rightAnswer, $userName)
{
    line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $rightAnswer . "'.");
    line();
    line("Let's try again, " . $userName . "!");
}

function userWin($userName)
{
    line("Congratulations, " . $userName . "!");
}
