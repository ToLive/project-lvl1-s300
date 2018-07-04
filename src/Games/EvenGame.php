<?php

namespace Games\EvenGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $getGameData = function () {
        $question = rand(0, 100);
        $answer = isEven($question) ? "yes" : "no";
        
        return array(
            "question" => $question,
            "right_answer" => $answer
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}

function isEven($num)
{
    return $num % 2 == 0;
}
