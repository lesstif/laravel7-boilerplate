<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class DebugBarOnOffController extends Controller
{
    public function set(Request $request)
    {
        $id = Auth::user()->id ?? null;

        if ($id === null)
            return response(404);

        $u = User::find($id);

        dump(['user' => $u]);

        $request->session()->put('enable_debugbar', $u->enable_debugbar);

        dump(['enable_debugbar' => $request->session()->get('enable_debugbar')]);

        return response(200);
    }
}
