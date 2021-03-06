<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

function generateQuestionCalc()
{
    $operators = ['+', '-', '*'];
    return [rand(0, 50), $operators[rand(0, 2)], rand(0, 50)];
}

function getCorrectAnswerCalc(array $question)
{
    [$a, $operator, $b] = $question;
    $answer = null;
    switch ($operator) {
        case '+':
            $answer = $a + $b;
            break;
        case '-':
            $answer = $a - $b;
            break;
        case '*':
            $answer = $a * $b;
    }
    return $answer;
}

function generateDataCalc(int $numberOfRounds = 3)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = generateQuestionCalc();
        $answers[] = getCorrectAnswerCalc($questions[$i]);
    }
    $stringQuestions = [];
    foreach ($questions as $question) {
        $stringQuestions[] = implode(' ', $question);
    }
    return [$stringQuestions, $answers];
}

function startCalcGame()
{
    $questionMessage = 'What is the result of the expression?';
    [$questions, $answers] = generateDataCalc();
    startGame($questionMessage, $questions, $answers);
}
