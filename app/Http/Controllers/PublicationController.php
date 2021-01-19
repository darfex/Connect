<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index(User $user)
    {
        return view('publications.index', [
            'user' => $user,
            'users' => recommend_users(),
            'publications' => $user->publications()->paginate(10)
        ]);
    }

    public function show(User $user, Publication $publication)
    {
        return view('publications.show', [
            'user' => $user,
            'publication' => $publication,
            'users' => recommend_users()
        ]);
    }

    public function create()
    {
        return view('publications.create', [
            'user' => auth()->user(),
            'users' => recommend_users()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['string', 'required', 'max:255'],
            'abstract' => ['string', 'required', 'min:300'],
            'document' => ['file', 'required']
        ]);

        $attributes['document'] = request('document')->store('publications');
        $attributes['user_id'] = auth()->id();
        
        Publication::create($attributes);

        return back()
            ->with('message', 'Your publication has been published');
    }

    public function edit(User $user, Publication $publication)
    {
        return view('publications.edit', [
            'user' => auth()->user(),
            'publication' => $publication,
            'users' => recommend_users()
        ]);
    }

    public function update(Publication $publication)
    {
        $attributes = request()->validate([
            'title' => ['string', 'required', 'max:255'],
            'abstract' => ['string', 'required', 'min:300'],
            'document' => ['file', 'nullable']
        ]);

        if(request('document')){
            $attributes['document'] = request('document')->store('publications');
        }

       $publication->update($attributes);

        return redirect(route('publications', auth()->user()) . "/$publication->id");
    }
}
