<?php

namespace Games\GCDGame;

use function \cli\line;
use function \cli\prompt;
use function \GameEngine\startGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $getGameData = function () {
        $question = implode(' ', array(rand(0, 100), rand(0, 100)));
        
        $questionArray = explode(' ', $taskStr);
        
        $firstNum = $task[0];
        $secondNum = $task[1];
        
        return array(
            "question" => $question,
            "right_answer" => getMaxDivisorOfTwo($firstNum, $secondNum)
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}

function getMaxDivisorOfTwo($firstNum, $secondNum)
{
    $result = 1;
        
    for ($i = 2; $i <= min($firstNum, $secondNum); $i += 1) {
        if (($firstNum % $i == 0) && ($secondNum % $i == 0)) {
            $result = $i;
        }
    }
    
    return $result;
}
