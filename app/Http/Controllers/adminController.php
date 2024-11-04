<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Event;
use App\Models\People;
use App\Models\Post;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\User;

class adminController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $people = People::all();
        $events = Event::all();
        $users = User::all();
        return view('admin', compact('categories', 'people', 'events', 'users'));
    }

    public function show($uid)
    {

        $reqs = ModelsRequest::orderBy('state', 'asc')->get();
        $req = ModelsRequest::where('uid', $uid)->first();
        return view('admin.requests', compact('reqs', 'req'));
    }

    public function requests()
    {
        $reqs = ModelsRequest::orderBy('state', 'asc')->get();
        $req = null;
        return view('admin.requests', compact('reqs', 'req'));
    }

    public function reports()
    {
        $reps = Report::orderBy('state', 'asc')->get();
        $rep = null;
        return view('admin.reports', compact('reps', 'rep'));
    }

    public function banList()
    {
        $usersBaneds = Ban::all();
        return view('admin.banlist', compact('usersBaneds'));
    }

    public function declinePost($id)
    {
        ModelsRequest::where('uid', $id)->update(['state' => 2]);
        $req = ModelsRequest::where('uid', $id)->first();
        return redirect()->route('admin.requests')->with('success', 'Post '. $req->post->event->tittle .' declined');

    }

    public function aceptPost($id)
    {
        try {
            ModelsRequest::where('uid', $id)->update(['state' => 1]);
            $req = ModelsRequest::where('uid', $id)->first();
            Post::where('uid', $req->post_uid)->update(['state' => 1]);
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
        return redirect()->route('admin.requests')->with('success', 'Post '. $req->post->event->tittle .' acepted');
    }
}
