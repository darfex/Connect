<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function update(User $user, Area $area)
    {
        $user->areas()->detach($area);
        return back();
    }
}
