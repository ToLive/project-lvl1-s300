<?php

namespace BrainGames\EvenGame;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
    
    $isGameOver = false;
    
    $answerCount = 0;
    
    while (!$isGameOver && $answerCount < 3) {
        $num = rand(0, 100);
        
        line("Question: " . $num);
        
        $answer = prompt('Your answer: ');                
        
        if ((isEven($num) && $answer == "yes") || (!isEven($num) && $answer == "no")) {
            $answerCount += 1;
            line("Correct!");
            continue;            
        } else {
            $isGameOver = true;
            line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . (isEven($num) ? "yes" : "no") . "'.");
            line("Let's try again, " . $userName . "!");
        }
    }
    
    if ($answerCount == 3) {
        line("Congratulations, " . $userName . "!");
    }
}

function isEven($num)
{
    return $num % 2 == 0 ? true : false;
}
