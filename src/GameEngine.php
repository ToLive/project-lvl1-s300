<?php

namespace GameEngine;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_TO_WIN = 3;

/**
 * Starts the game
 *
 * @param string $gameDescription Game description for user
 * @param object $getGameData Array of strings with game data. Required "question" and "right_answer" keys
 */
function startGame($gameDescription, object $getGameData)
{
    line('Welcome to the Brain Game!');
    line($gameDescription);

    $userName = prompt('May I have your name?');

    line("Hello, %s!", $userName);
    line();
    
    for ($i = 0; $i < ANSWERS_TO_WIN; $i += 1) {
        $gameData = $getGameData();
        
        $question = $gameData["question"];
        $rightAnswer = $gameData["right_answer"];
    
        line("Question: {$question}");
    
        $userAnswer = prompt('Your answer: ');
    
        if ($rightAnswer !== $userAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'");
            line();
            line("Let's try again, {$userName}!");
            return;
        }
        
        line("Correct!");
        line();
    }
    
    line("Congratulations, {$userName}!");
}
