<?php

namespace Games\ProgressionGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'What number is missing in this progression?';
const PROGRESSION_LENGHT = 10;

function run()
{
    $getGameData = function () {
        $startNum = rand(0, 10);
        $step = rand(0, 10);
        $progressionArray = range($startNum, $step * (PROGRESSION_LENGHT - 1) + $startNum, $step);
        
        $maskedElementIndex = rand(0, PROGRESSION_LENGHT - 1);
        $maskedElement = $progressionArray[$maskedElementIndex];
        
        $progressionArray[$maskedElementIndex] = '..';
        
        return array(
            "question" => implode(' ', $progressionArray),
            "right_answer" => $maskedElement
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}
