<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Entities\Question;
use App\Models\QuestionModel;

class QuestionController extends Controller
{
    public function index()
    {
        $this->render('question/index');
    }
}
