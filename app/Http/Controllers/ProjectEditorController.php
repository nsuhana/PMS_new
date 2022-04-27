<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\vendor;
use App\Models\user;
use App\Models\user_project;
use App\Models\vendor_profile;
use App\Models\project_card;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProjectEditorController extends Controller
{
    public function index(project $projek) {

        $view = $this->isAdminRequest() ? 'admin.projek.editor.index' : 'projek.tetapan.editor.index';

        $user_project = user_project::where('project_id',$projek->id)->orderBy('user_role_project', 'desc')->get();
        return view($view,[
            'project' => $projek,
            'user_projects' => $user_project,
        ]);
    }    
    
    public function read(Request $request, project $projek) {

        $view = $this->isAdminRequest() ? 'admin.projek.editor.read' : 'projek.tetapan.editor.read';

        $user_project = user_project::where('project_id',$projek->id)->orderBy('user_role_project', 'desc')->get();
        return view($view,[
            'project' => $projek,
            'user_projects' => $user_project,
        ]);
    }

    public function search(Request $request, project $projek) {

        $view = $this->isAdminRequest() ? 'admin.projek.editor.search' : 'projek.tetapan.editor.search';

        $request->validate([
            'keyword' => ['nullable', 'string'],
        ]);

        $a = $request->keyword;

        $result = User::when($request->keyword != null, function ($q) use ($a) {
            return $q->where(function ($q2) use ($a) {
                    return $q2->where('name', 'LIKE', '%'.$a.'%')->orWhere('email', 'LIKE', '%'.$a.'%');
            });
        }, function ($q) {
            return $q;  
        })->join('roles', 'roles.user_id', '=', 'users.id')
        ->where(function ($q) {
            $q->where('roles.superuser', '1')
            ->orWhere('roles.admin', '1')
            ->orWhere('roles.staffuser','1');
        })
        ->limit(30)->get();

        return view($view,[
            'project' => $projek,
            'results' => $result,
        ]);
    }

    public function store(Request $request, project $projek) {
        $request->validate([
            'id' => ['nullable', 'string'],
        ]);

        $user_project = user_project::create([
            'user_id' => $request->id,
            'project_id' => $projek->id,
            'user_role_project' => 'editor',
        ]);

        \LogActivity::addToLog(Auth::user()->name.' add an editor to a projek ['.$projek->tajuk_projek.']');

        return response()->json([
            'status'=>200,
            'message'=>'User added as editor!',
            'title_message' => 'Message',
        ]);

    }

    public function destroy(project $projek, user_project $user_projek) {

        \LogActivity::addToLog(Auth::user()->name.' remove an editor from a projek ['.$projek->tajuk_projek.']');

        $user_projek->forcedelete();
        return response()->json([
            'status'=>200,
            'message'=>'User removed!',
            'title_message' => 'Message',
        ]);
    }

    public function updateStatus(project $projek, user_project $user_projek) {

        if ($projek->user_project->whereIn('user_id', Auth::user()->id)->whereIn('user_role_project', 'owner')->isNotEmpty() || Auth::user()->isAdministrator()) {

            $curr_owner = user_project::where('project_id', $projek->id)->where('user_role_project', 'owner')->first();
            if($curr_owner->id == $user_projek->id) {
                return response()->json([
                    'status'=>200,
                    'message'=>'Nothing changes',
                    'title_message' => 'Message',
                ]);
            }else {
                $curr_owner->user_role_project = 'editor';
                $curr_owner->save();
                $user_projek->user_role_project = 'owner';
                $user_projek->save();

                \LogActivity::addToLog(Auth::user()->name.' transfer project ownership to another user ['.$projek->tajuk_projek.']');

                return response()->json([
                    'status'=>200,
                    'message'=>'Ownership updated',
                    'title_message' => 'Message',
                ]);
            }

        }
        else {

            \LogActivity::addToLog(Auth::user()->name.' attempt to transfer project ownership ['.$projek->tajuk_projek.']');

            return response()->json([
                'status'=>400,
                'message'=>'You don\' have the privilege to transfer project ownership',
                'title_message' => 'Message',
            ]);
        }



    }
}
