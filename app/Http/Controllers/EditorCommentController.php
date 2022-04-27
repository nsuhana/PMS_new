<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\editor_comment;
use App\Models\project;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\Storeeditor_commentRequest;
// use App\Http\Requests\Updateeditor_commentRequest;

use Illuminate\Support\Facades\Validator;

class EditorCommentController extends Controller
{
    public function index(project $projek)
    {
        $komen = editor_comment::where('project_id', $projek->id)->orderBy('updated_at', 'desc')->get();

        $view = 'projek.tetapan.log.index';

        return view($view, [
            'project' => $projek,
            'comment' => $komen,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, project $projek)
    {
        $request->validate([
            'comment' => ['required', 'string', "max:100"],
            'fasa' => ['required', 'string', "max:20"],
            'peratus' => ['required', 'numeric'],
        ]);

        editor_comment::create([
            'user_id' => Auth::user()->id,
            'project_id' => $projek->id,
            'ulasan' => $request->comment,
            'peratus_siap' => $request->peratus,
            'fasa_sekarang' => $request->fasa,
        ]);

        \LogActivity::addToLog(Auth::user()->name.' created a new comment to projek ['.$projek->tajuk_projek.']');

        return redirect('/projek/'.$projek->id);
    }

    public function destroy(project $projek, editor_comment $ulasan)
    {
        $ulasan->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' deleted a comment from projek ['.$projek->tajuk_projek.']');

        return redirect('/projek/'.$projek->id.'/tetapan');
    }

}
