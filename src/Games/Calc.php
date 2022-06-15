<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

function generateQuestionCalc($numberOfRounds = 3)
{
    $operators = ['+', '-', '*'];
    $questions = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $questions[] = [rand(0, 50), $operators[rand(0, 2)], rand(0, 50)];
    }
    return $questions;
}

function getCorrectAnswerCalc($questions, $numberOfRounds = 3)
{
    $answers = [];
    foreach ($questions as [$a, $operator, $b]) {
        switch ($operator) {
            case '+':
                $answers[] = $a + $b;
                break;
            case '-':
                $answers[] = $a - $b;
                break;
            case '*':
                $answers[] = $a * $b;
        }
    }
    return $answers;
}

function startCalcGame()
{
    $questionMessage = 'What is the result of the expression?';
    $questions = generateQuestionCalc();
    $correctAnswers = getCorrectAnswerCalc($questions);
    $stringQuestions = [];
    $stringAnswers = [];
    foreach ($questions as $question) {
        $stringQuestions[] = implode($question);
    }
    foreach ($correctAnswers as $answer) {
        $stringAnswers[] = (string) $answer;
    }
    startGame($questionMessage, $stringQuestions, $stringAnswers);
}
