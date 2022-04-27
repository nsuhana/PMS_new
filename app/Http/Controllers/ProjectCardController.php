<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;
use App\Models\project_card;
use App\Models\card_view;
use App\Http\Requests\Storeproject_cardRequest;
use App\Http\Requests\Updateproject_cardRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class ProjectCardController extends Controller
{
    public function index()
    {
        //
    }

    public function create(project $projek)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.card.create', [
            'projek' => $projek,
        ]);
    }

    public function store(Request $request, project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $request->validate([
            'tajuk_besar' => ['required', 'string'],
            'kandungan' => ['required', 'string'],
            'publish' => ['required', Rule::in(['1', '0'])],
            'staff' => ['nullable', Rule::in(['1', '0'])],
            'editor' => ['nullable', Rule::in(['1', '0'])],
            'normal_user' => ['nullable', Rule::in(['1', '0'])],
            'guest' => ['nullable', Rule::in(['1', '0'])],
        ]);

        $project_card = project_card::create([
            'project_id' => $projek->id,
            'tajuk_besar' => $request->tajuk_besar,
            'content' => $request->kandungan,
        ]);

        card_view::create([
            'card_id' => $project_card->id,
            'staff' => $request->staff? '1' : '0',
            'editor' => $request->editor? '1' : '0',
            'normal_user' => $request->normal_user? '1' : '0',
            'guest' => $request->guest? '1' : '0',
        ]);

        \LogActivity::addToLog(Auth::user()->name.' created a projek kandungan [projek: '.$projek->tajuk_projek.']');

        return redirect('/projek/'.$projek->id);
    }

    public function show(project_card $project_card)
    {
        //
    }

    public function edit(project $projek, project_card $kandungan)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.card.edit', [
            'projek' => $projek,
            'kandungan' => $kandungan,
        ]);
    }

    public function update(Request $request, project $projek, project_card $kandungan)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $request->validate([
            'tajuk_besar' => ['required', 'string'],
            'kandungan' => ['required', 'string'],
            'publish' => ['required', Rule::in(['1', '0'])],
            'staff' => ['nullable', Rule::in(['1', '0'])],
            'editor' => ['nullable', Rule::in(['1', '0'])],
            'normal_user' => ['nullable', Rule::in(['1', '0'])],
            'guest' => ['nullable', Rule::in(['1', '0'])],
        ]);
        
        $kandungan->tajuk_besar = $request->tajuk_besar;
        $kandungan->content = $request->kandungan;
        $kandungan->publish = $request->publish;

        $kandungan->card_view->staff = ($request->staff)? '1' : '0';
        $kandungan->card_view->editor = ($request->editor)? '1' : '0';
        $kandungan->card_view->normal_user = ($request->normal_user)? '1' : '0';
        $kandungan->card_view->guest = ($request->guest)? '1' : '0';
        $kandungan->save();
        $kandungan->card_view->save();

        \LogActivity::addToLog(Auth::user()->name.' edit a projek kandungan [projek: '.$projek->tajuk_projek.', kadungan id: '.$kandungan->id.']');

        return redirect('/projek/'.$projek->id);
    }

    public function destroy(project $projek, project_card $kandungan)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        \LogActivity::addToLog(Auth::user()->name.' delete a projek kandungan [projek: '.$projek->tajuk_projek.', kadungan id: '.$kandungan->id.']');
        
        $kandungan->forcedelete();

        return redirect('/projek/'.$projek->id);
    }
}
