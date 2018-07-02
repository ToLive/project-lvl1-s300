<?php

namespace Games\CalcGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\CalcGameLogic\getTaskRightAnswer;
use function \Logic\CalcGameLogic\isAnswerCorrect;
use function \Logic\CommonLogic\printGameResult;
    
function run()
{
    line('Welcome to the Brain Game!');
    line('What is the result of the expression?');

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
    
    $answerCount = 0;
    $isGameOver = false;
    
    while (!$isGameOver && $answerCount < 3) {
        $operArray = array("+", "-", "*");
        $task = array(rand(0, 100), $operArray[rand(0, 2)], rand(0, 100));
    
        line("Question: " . implode(" ", $task));
    
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
