<?php

namespace Games\BalanceGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'Balance the given number.';

function run()
{
    $getGameData = function () {
        $question = rand(100, 9999);
        
        return array(
            "question" => $question,
            "right_answer" => flattingNum($question)
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}

function flattingNum($num)
{
    $numArray = str_split($num);
    
    $isNumArraySorted = false;
    
    while (!$isNumArraySorted) {
        sort($numArray);
        
        $first = (int) $numArray[0];
        $last = (int) end($numArray);
        $sumFirstAndLast = $last + $first;
        
        if ($last - $first <= 1) {
            $isNumArraySorted = true;
        } else {
            $temp = $last;
            $numArray[count($numArray) - 1] = intdiv($sumFirstAndLast, 2) + intval($sumFirstAndLast) % 2;
            $numArray[0] = $sumFirstAndLast - end($numArray);
        }
    }
    
    return implode('', $numArray);
}
