<?php

namespace Logic\CommonLogic;

use function \cli\line;

function printGameResult($isGameOver, $userAnswer, $rightAnswer, $userName)
{
    if ($isGameOver) {
        userLoose($userAnswer, $rightAnswer, $userName);
    } else {
        userWin($userName);
    }
}

function userLoose($userAnswer, $rightAnswer, $userName)
{
    line("'" . $userAnswer . "' is wrong answer ;(. Correct answer was '" . $rightAnswer . "'.");
    line();
    line("Let's try again, " . $userName . "!");
}

function userWin($userName)
{
    line("Congratulations, " . $userName . "!");
}
