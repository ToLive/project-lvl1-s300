<?php

namespace Games\CalcGame;

use function \cli\line;
use function \cli\prompt;
use function \Logic\GameEngine\startGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $getQuestionData = function () {
        $operArray = array('+', '-', '*');
        
        $question = implode(' ', array(rand(0, 100), $operArray[rand(0, 2)], rand(0, 100)));
        
        $questionArray = explode(' ', $question);
        
        $leftOperand = $questionArray[0];
        $operator = $questionArray[1];
        $rightOperand = $questionArray[2];
        
        return array(
            "QUESTION" => $question,
            "RIGHT_ANSWER" => getExpressionResult($leftOperand, $operator, $rightOperand)
        );
    };
    
    startGame(GAME_DESCRIPTION, $getQuestionData);
}

function getExpressionResult($leftOperand, $operator, $rightOperand)
{
    switch ($operator) {
        case "+":
            $result = $leftOperand + $rightOperand;
            break;
        case "-":
            $result = $leftOperand - $rightOperand;
            break;
        case "*":
            $result = $leftOperand * $rightOperand;
            break;
        default:
            $result = null;
            break;
    }
    
    return $result;
}
