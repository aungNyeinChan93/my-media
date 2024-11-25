<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    // trend posts index page
    public function index()
    {
        // $actionLogs = ActionLog::query()->groupBy('post_id')->count();

        $posts = ActionLog::select('action_logs.*', 'posts.*')
            ->leftJoin('posts', 'posts.id', '=', 'action_logs.post_id')
            ->paginate(5);
        // dd($posts);
        return view("admin.trendPost.index", compact('posts'));
    }
}
