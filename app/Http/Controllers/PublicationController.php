<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use App\Http\Requests\CreatePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    public function index(User $user)
    {
        return view('publications.index', [
            'user' => $user,
            'publications' => $user->publications()->paginate(10)
        ]);
    }

    public function show(User $user, Publication $publication)
    {
        return view('publications.show', [
            'user' => $user,
            'publication' => $publication,
        ]);
    }

    public function create()
    {
        return view('publications.create', [
            'user' => auth()->user(),
        ]);
    }

    public function store(CreatePublicationRequest $request)
    {
        $attributes = $request->all();
        $attributes['document'] = $request->document->store('publications');
        $attributes['user_id'] = $request->user()->id;
        
        Publication::create($attributes);
    
        return redirect()->action([PublicationController::class, 'index'], ['user' => $request->user()]);
    }

    public function edit(User $user, Publication $publication)
    {
        return view('publications.edit', [
            'user' => $user,
            'publication' => $publication,
        ]);
    }

    public function update(UpdatePublicationRequest $request, $id)
    {
        $attributes = $request->all();

        if($request->has('document')){
            $attributes['document'] = $request->document->store('publications');
        }

        $publication = Publication::find($id);
        $publication->update($attributes);

        return redirect(route('publications', auth()->user()) . "/$publication->id");
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return back()
            ->with('message', 'Publication deleted');
    }
}