<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Exception;
use Illuminate\Http\Request;

class ActionLogsController extends Controller
{
    //view actionLogs
    public function view(Request $request)
    {
        // dd($request->all());
        try {
            $fields = $request->validate([
                'user_id' => 'required',
                'post_id' => 'required'
            ]);

            if (!empty($fields)) {
                $actionlog = ActionLog::create($fields);
            }

            $views = ActionLog::query()->where('post_id', '=', $request->post_id)->get();

            return response()->json([
                'message' => 'success',
                "data" => $actionlog,
                'viewsCounts' => count($views),
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'message' => $err->getMessage(),
            ]);
        }
    }
}
