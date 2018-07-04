<?php

namespace Games\CalcGame;

use function \cli\line;
use function \cli\prompt;
use function \GameEngine\startGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const AVAILABLE_OPERATORS = ['+', '-', '*'];

function run()
{
    $getGameData = function () {
        $operArray = array('+', '-', '*');
      
        $leftOperand = rand(0, 100);
        $operator = AVAILABLE_OPERATORS[rand(0, 2)];
        $rightOperand = rand(0, 100);
        
        return array(
            "question" => $leftOperand . ' ' . $operator . ' ' . $rightOperand,
            "right_answer" => getExpressionResult($leftOperand, $operator, $rightOperand)
        );
    };
    
    startGame(GAME_DESCRIPTION, $getGameData);
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
