<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

function generateQuestionGcd($numberOfRounds = 3)
{
    $questions = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = [rand(1, 100), rand(1, 100)];
    }
    return $questions;
}

function calcGcd($a, $b)
{
    if ($a < $b) {
        $currentDivider = $a;
    } else {
        $currentDivider = $b;
    }
    while ($currentDivider > 1) {
        if (($a % $currentDivider === 0) && ($b % $currentDivider === 0)) {
            return $currentDivider;
        }
        $currentDivider--;
    }
    return $currentDivider;
}

function getCorrectAnswerGcd($questions)
{
    $answers = [];
    foreach ($questions as [$a, $b]) {
        $answers[] = calcGcd($a, $b);
    }
    return $answers;
}

function startGcdGame()
{
    $questionMessage = 'Find the greatest common divisor of given numbers.';
    $questions = generateQuestionGcd();
    $correctAnswers = getCorrectAnswerGcd($questions);
    $stringQuestions = [];
    $stringAnswers = [];
    foreach ($questions as $question) {
        $stringQuestions[] = implode(" ", $question);
    }
    startGame($questionMessage, $stringQuestions, $correctAnswers);
}
