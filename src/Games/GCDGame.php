<?php

namespace Games\GCDGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;
    
function run()
{
    $rulesStr = 'Find the greatest common divisor of given numbers.';
    
    $taskGenFunc = function () {
        return implode(' ', array(rand(0, 100), rand(0, 100)));
    };
    
    $answerCheckFunc = function ($taskStr) {
        $task = explode(' ', $taskStr);
        
        $left = $task[0];
        $right = $task[1];
        
        $result = 1;
        
        for ($i = 2; $i <= min($left, $right); $i += 1) {
            if (($left % $i == 0) && ($right % $i == 0)) {
                $result = $i;
            }
        }
        
        return $result;
    };
    
    startGame($rulesStr, $taskGenFunc, $answerCheckFunc);
}
