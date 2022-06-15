<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;
use function BrainGames\Games\Gcd\calcGcd as GcdCalcGcd;

function generateQuestionGcd()
{
    return [rand(1, 100), rand(1, 100)];
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

function generateDataGcd($numberOfRounds = 3)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = generateQuestionGcd();
        [$a, $b] = $questions[$i];
        $answers[] = GcdCalcGcd($a, $b);
    }
    $stringQuestions = [];
    foreach ($questions as $question) {
        $stringQuestions[] = implode(' ', $question);
    }
    return [$stringQuestions, $answers];
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
    [$questions, $answers] = generateDataGcd();
    startGame($questionMessage, $questions, $answers);
}
