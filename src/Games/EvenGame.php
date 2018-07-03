<?php

namespace Games\EvenGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $getQuestionData = function () {
        $question = rand(0, 100);
        $answer = isEven($question) ? "yes" : "no";
        
        return array(
            "QUESTION" => $question,
            "RIGHT_ANSWER" => $answer
        );
    };
    
    startGame(GAME_DESCRIPTION, $getQuestionData);
}

function isEven($num)
{
    return $num % 2 == 0;
}
