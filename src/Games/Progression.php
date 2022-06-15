<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

function generateProgression()
{
    $lenOfProgression = rand(5, 15);
    $difference = rand(1, 10);
    $element = rand(0, 50);
    $progression = [];
    for ($i = 0; $i < $lenOfProgression; $i++) {
        $progression[] = $element;
        $element += $difference;
    }
    return $progression;
}

function generateQuestionProgression()
{
    $question = generateProgression();
    $questionIndex = rand(0, (count($question) - 1));
    $answer = $question[$questionIndex];
    $question[$questionIndex] = '..';
    return [$question, $answer];
}

function generateDataGcd($numberOfRounds = 3)
{
    $questions = [];
    $answers = [];
    for ($i = 0; $i < $numberOfRounds; $i++) {
        [$question, $answer] = generateQuestionProgression();
        $questions[] = $question;
        $answers[] = $answer;
    }
    $stringQuestions = [];
    foreach ($questions as $question) {
        $stringQuestions[] = implode(' ', $question);
    }
    return [$stringQuestions, $answers];
}

function startProgressionGame()
{
    $questionMessage = 'What number is missing in the progression?';
    [$questions, $answers] = generateDataGcd();
    startGame($questionMessage, $questions, $answers);
}
