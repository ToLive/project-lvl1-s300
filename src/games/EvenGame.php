<?php

namespace games;

use function \cli\line;
use function \cli\prompt;

class EvenGame implements \interfaces\IGameInterface
{
    private $isGameOver = false;
    
    public function __construct()
    {
    }
    
    public function getTaskRightAnswer($task)
    {
        return $task % 2 == 0 ? "yes" : "no";
    }
    
    public function isAnswerCorrect($userAnswer, $task)
    {
        return ($this->getTaskRightAnswer($task) == $userAnswer);
    }
    
    public function run()
    {
        line('Welcome to the Brain Game!');
        line('Answer "yes" if number even otherwise answer "no".');

        $userName = prompt('May I have your name?');

        line("Hello, %s!", $userName);
        line();
        
        $answerCount = 0;
    
        while (!$this->isGameOver && $answerCount < 3) {
            $task = rand(0, 100);
        
            line("Question: " . $task);
        
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
