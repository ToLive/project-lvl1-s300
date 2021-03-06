<?php

namespace Games\PrimeGame;

use function \GameEngine\startGame;

const GAME_DESCRIPTION = 'Answer "yes" if number is prime otherwise answer "no".';

function run()
{
    $getGameData = function () {
        $question = rand(0, 100);
        $answer = isPrime($question) ? "yes" : "no";
        
        return array(
            "question" => (string) $question,
            "right_answer" => (string) $answer
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    
    if ($num == 2) {
        return true;
    }
    
    if ($num % 2 == 0) {
        return false;
    }

    for ($i = 3; $i <= ceil(sqrt($num)); $i += 2) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
