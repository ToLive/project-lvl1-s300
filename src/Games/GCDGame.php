<?php

namespace Games\GCDGame;

use function \GameEngine\startGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $getGameData = function () {
        $firstNum = rand(0, 100);
        $secondNum = rand(0, 100);
        
        return array(
            "question" => $firstNum . ' ' . $secondNum,
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
