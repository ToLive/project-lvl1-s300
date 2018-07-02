<?php

namespace games;

use function \cli\line;
use function \cli\prompt;

class CalcGame implements \interfaces\IGameInterface
{
    private $isGameOver = false;
    
    public function __construct()
    {
    }
    
    public function getTaskRightAnswer($task)
    {
        $left = $task[0];
        $right = $task[2];
        $operator = $task[1];
        
        $result = null;
        
        switch ($operator) {
            case "+":
                $result = $left + $right;
                break;
            case "-":
                $result = $left - $right;
                break;
            case "*":
                $result = $left * $right;
                break;
            default:
                break;
        }
        
        return $result;
    }
    
    public function isAnswerCorrect($userAnswer, $task)
    {
        return ($this->getTaskRightAnswer($task) == $userAnswer);
    }
    
    public function run()
    {
        line('Welcome to the Brain Game!');
        line('What is the result of the expression?');

        $userName = prompt('May I have your name?');

        line("Hello, %s!", $userName);
        line();
        
        $answerCount = 0;
        
        while (!$this->isGameOver && $answerCount < 3) {
            $operArray = array("+", "-", "*");
            $task = array(rand(0, 100), $operArray[rand(0, 2)], rand(0, 100));
        
            line("Question: " . implode(" ", $task));
        
            $userAnswer = prompt('Your answer: ');
            $rightAnswer = $this->getTaskRightAnswer($task);
        
            if ($this->isAnswerCorrect($userAnswer, $task)) {
                $answerCount += 1;
            
                line("Correct!");
                line();
            
                continue;
            } else {
                $this->isGameOver = true;
            
                line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $rightAnswer . "'.");
                line();
                line("Let's try again, " . $userName . "!");
            }
        }
    
        if ($answerCount == 3) {
            line();
            line("Congratulations, " . $userName . "!");
        }
    }
}
