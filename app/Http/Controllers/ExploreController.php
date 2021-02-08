<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ExploreController extends Controller
{
    public function index()
    {
        $friends = (auth()->user()->follows)->pluck('id');

        $friends->push(auth()->user()->id);

        return view('explore', [
            'people' => User::whereNotIn('id', $friends)->orderBy('lastname')->paginate(10),
        ]);
    }
}
