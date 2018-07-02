<?php

namespace Games\EvenGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\EvenGameLogic\getTaskRightAnswer;
use function \Logic\EvenGameLogic\isAnswerCorrect;
use function \Logic\CommonLogic\printGameResult;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
    
    $answerCount = 0;
    $isGameOver = false;

    while (!$isGameOver && $answerCount < 3) {
        $task = rand(0, 100);
    
        line("Question: " . $task);
    
        $userAnswer = prompt('Your answer: ');
        $rightAnswer = getTaskRightAnswer($task);
    
        if (!isAnswerCorrect($userAnswer, $task)) {           
            $isGameOver = true;
            break;
        }
        
        $answerCount += 1;
        
        line("Correct!");
        line();
    }
    
    printGameResult($isGameOver, $userAnswer, $rightAnswer, $userName);
}
