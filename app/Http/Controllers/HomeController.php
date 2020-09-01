<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $now = Carbon::now();

        $tasks_in_due = Task::where('assignee_id', '=', $user->id)
            ->where('due_date', '>=', $now->addDays(15))
            ->get();

        return view('home')->with('tasks_in_due', $tasks_in_due);
    }
}
