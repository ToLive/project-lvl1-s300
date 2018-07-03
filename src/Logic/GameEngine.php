<?php

namespace Logic\GameEngine;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_TO_WIN = 3;
   
function startGame($gameDescription, $getQuestionData)
{
    line('Welcome to the Brain Game!');
    line($gameDescription);

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
    
    for ($i = 0; $i <= ANSWERS_TO_WIN; $i += 1) {
        if ($i == ANSWERS_TO_WIN) {
            line("Congratulations, " . $userName . "!");
            break;
        }
        
        $questionData = $getQuestionData();
        
        $question = $questionData["QUESTION"];
        $rightAnswer = $questionData["RIGHT_ANSWER"];
    
        line("Question: " . $question);
    
        $userAnswer = prompt('Your answer: ');
    
        if ($rightAnswer != $userAnswer) {
            line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $rightAnswer . "'.");
            line();
            line("Let's try again, " . $userName . "!");
            break;
        }
        
        line("Correct!");
        line();
    }
}
