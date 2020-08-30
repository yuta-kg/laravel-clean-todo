<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(TodoCreateUseCaseInterface $interactor, Request $request)
    {
        $title = $request->input('title');
        $limit = $request->input('limit');
        $completed = $request->input('completed');
        $response = $interactor->handle($title, $limit, $completed); //$interactorが使用できる形に変換

        $viewmodel = new TodoCreateViewModel($response->title, $response->limit, $response->completed); //viewようにデータを変換
        return view('todo.index', compact('viewmodel'));
    }
}
