<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\QuestionModel;



class HomeController extends Controller
{
    public function index()
    {

        $this->render('home/index');
    }
}
