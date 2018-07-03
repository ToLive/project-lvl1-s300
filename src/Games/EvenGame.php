<?php

namespace Games\EvenGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

function run()
{
    $rulesStr = 'Answer "yes" if number even otherwise answer "no".';
    
    $taskGenFunc = function () {
        return rand(0, 100);
    };
    
    $answerCheckFunc = function ($task) {
        return $task % 2 == 0 ? "yes" : "no";
    };
    
    startGame($rulesStr, $taskGenFunc, $answerCheckFunc);
}
