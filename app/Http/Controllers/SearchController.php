<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        request()->validate([
            'search' => ['string']
        ]);

        $query = request('search');

        if(request('by') === 'user')
        {
            $data = User::where('firstname', 'LIKE', '%'.$query.'%')
                ->orWhere('lastname', 'LIKE', '%'.$query.'%')
                ->paginate(10);

            return view('search_user', [
                'data' => $data,
                'users' => recommend_users()
            ]);
        }
        elseif(request('by') === 'publication')
        {
            $data = Publication::where('title', 'LIKE', '%'.$query.'%')
                ->orWhere('abstract', 'LIKE', '%'.$query.'%')
                ->paginate(10);

            return view('search_pub', [
                'data' => $data,
                'users' => recommend_users()
            ]);
        }

    }
}
