<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class TrendPostController extends Controller
{
    // trend posts index page
    public function index()
    {
        $actionLogs = ActionLog::select('action_logs.*', DB::raw('COUNT(action_logs.post_id) as count'))
            ->groupBy('post_id')
            ->orderBy('count', 'desc')
            ->paginate(5);
        // dd($actionLogs);

        // $posts = ActionLog::select('action_logs.*', 'posts.*')
        //     ->leftJoin('posts', 'posts.id', '=', 'action_logs.post_id')
        //     ->groupBy('action_logs.post_id')
        //     ->get();
        // dd($posts);

        return view("admin.trendPost.index", compact('actionLogs'));
    }

    // detail trendPost
    public function detail(Post $post)
    {

        return view('admin.trendPost.detail', compact('post'));
    }
}
