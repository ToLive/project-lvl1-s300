<?php

namespace Games\EvenGame;

use function \GameEngine\startGame;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $getGameData = function () {
        $question = rand(0, 100);
        $answer = isEven($question) ? "yes" : "no";
        
        return array(
            "question" => (string) $question,
            "right_answer" => (string) $answer
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
}

function isEven($num)
{
    return $num % 2 == 0;
}
