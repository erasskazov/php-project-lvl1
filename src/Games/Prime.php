<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

function generateQuestionPrime($numberOfRounds = 3)
{
    return rand(0, 100);
}

function isPrime($number)
{   
    if ($number === 1 || $number === 0) {
        return false;
    }
    $divider = 2;
    for ($i = $divider; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generateDataPrime($numberOfRounds = 3)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = generateQuestionPrime();
        $answers[] = isPrime($questions[$i]) ? 'yes' : 'no';
    }
    return [$questions, $answers];
}

function startPrimeGame()
{
    $questionMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    [$questions, $answers] = generateDataPrime();
    startGame($questionMessage, $questions, $answers);
}
