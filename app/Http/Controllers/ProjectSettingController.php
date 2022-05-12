<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;
use App\Models\user_project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjectSettingController extends Controller
{
    public function index(project $projek) {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        \LogActivity::addToLog(Auth::user()->name.' access projek settings ['.$projek->tajuk_projek.']');

        $view = 'projek.tetapan.index';

        return view($view, [
            'project' => $projek,
        ]);
    }

    public function updateDescription(Request $request, project $projek) {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $request->validate([
            'description' => ['required', 'string'],
        ]);

        \LogActivity::addToLog(Auth::user()->name.' update the description of a projek ['.$projek->tajuk_projek.']');

        $projek->description = $request->description;
        $projek->save();

        return redirect('/projek/' . $projek->id . '/tetapan');

    }

    public function updateStatus(Request $request, project $projek) {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $request->validate([
            // 'status' => ['required', Rule::in(['aktif', 'tidak aktif', 'selesai'])],
            'status' => ['required', Rule::in(['ikut jadual', 'dalam perlaksanaan', 'projek lewat', 'projek sakit'])],
        ]);

        $projek->status = $request->status;
        $projek->save();

        \LogActivity::addToLog(Auth::user()->name.' update the status of a projek ['.$projek->tajuk_projek.']');

        return redirect('/projek/' . $projek->id . '/tetapan');

    }

    public function updateStatusPublish(project $projek) {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }
        
        if ($projek->publish === 1) {
            $projek->publish = 0;
        }
        else {
            $projek->publish = 1;
        }

        \LogActivity::addToLog(Auth::user()->name.' update the publish status of a projek ['.$projek->tajuk_projek.']');

        $projek->save();
        
        return redirect('/projek/' . $projek->id);
    }

}
