<?php
class BaseController
{
    public function model($model)
    {
        require_once "./Customer/App/models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        require_once './Customer/App/core/function.php'; // Call the function using
        $func = new Func; // init function

        require_once "./Customer/App/views/layouts/" . $view . ".php";
    }
}
