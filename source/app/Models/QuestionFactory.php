<?php

namespace App\Models;

use App\Exceptions\NotValidQuestionClassException;

class QuestionFactory {

    const QUESTIONS_NAMESPACE = "App\Models\\";

    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!static::$instance instanceof self) {
            static::$instance = new self;
        }

        return static::$instance;
    }

    public function validQuestionClasses() {
        return [
            "MultipleChoiceQuestionSingleOption"
        ];
    }

    public function isValidQuestionClass($questionClassName) {
        return in_array($questionClassName, $this->validQuestionClasses());
    }

    public function getQuestionByClassName($questionClassName) {
        if($this->isValidQuestionClass($questionClassName)) {
            $completeClassName = static::QUESTIONS_NAMESPACE.$questionClassName;

            return new $completeClassName();
        }

        throw new NotValidQuestionClassException($questionClassName." no es una clase valida");
    }

}
