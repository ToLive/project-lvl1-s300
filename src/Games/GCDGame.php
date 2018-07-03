<?php

namespace Games\GCDGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $getQuestionData = function () {
        $question = implode(' ', array(rand(0, 100), rand(0, 100)));
        
        $questionArray = explode(' ', $taskStr);
        
        $firstNum = $task[0];
        $secondNum = $task[1];
        
        return array(
            "QUESTION" => $question,
            "RIGHT_ANSWER" => getMaxDivisorOfTwo($firstNum, $secondNum)
        );
    };
    
    startGame(GAME_DESCRIPTION, $getQuestionData);
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
