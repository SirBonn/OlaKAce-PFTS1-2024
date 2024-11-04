<?php

namespace App\Http\Controllers;

use App\Models\Attend;
use App\Models\Category;
use App\Models\Event;
use App\Models\People;
use App\Models\Post;
use App\Models\Reason;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class publisherController extends BaseController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $people = People::all();
        $posts = Post::where('user_uid', Auth::user()->uid)->get();
        $attends = null;
        return view('poster', compact('categories', 'people', 'posts', 'attends'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {


            $request->validate([
                'tittle' => 'required|string',
                'date' => 'required',
                'time' => 'required',
                'people' => 'required',
                'category' => 'required',
                'spaces' => 'required',
                'site' => 'required',
                'desc' => 'required',
            ]);


            $event = Event::create([
                'tittle' => $request['tittle'],
                'event_date' => $request['date'],
                'event_time' => $request['time'],
                'public_uid' => $request['people'],
                'category_uid' => $request['category'],
                'spaces' => $request['spaces'],
                'site' => $request['site'],
                'user_uid' => Auth::user()->uid,
            ]);

            $post = Post::create([
                'message' => $request['desc'],
                'event_uid' => $event->uid,
                'user_uid' => Auth::user()->uid,
            ]);
        } catch (\Exception $e) {
            return 'Error al crear el evento, intentalo de nuevo' . $e->getMessage();
        }

        // dd($event, $post);

        return redirect()->route('publisher')->with('success', 'Evento creado correctamente, si no lo ves en la lista, espera a que un administrador apruebe la publicacion');
    }

    public function attend($id_event)
    {
        $event = Event::find($id_event);
        try{
        Attend::create([
            'event_uid' => $event->uid,
            'user_uid' => Auth::user()->uid,
        ]);
        $difference = strtotime($event->event_date) - strtotime(date('Y-m-d'));
        return redirect()->route('guest')->with('success', 'Asistiras al evento en ' . $difference / 86400 . ' dias');
        }catch(\Exception $e){
            return 'Error al asistir al evento, intentalo de nuevo' . $e->getMessage();
        }

    }

    public function noAttend($id_event)
    {
        $event = Event::find($id_event);
        try{
        Attend::where('event_uid', $event->uid)->where('user_uid', Auth::user()->uid)->delete();
        return redirect()->route('guest')->with('success', 'No asistiras al evento');
        }catch(\Exception $e){
            return 'Error al no asistir al evento, intentalo de nuevo' . $e->getMessage();
        }
    }

    public function viewAttend($id_event)
    {
        $event = Event::find($id_event);
        $attends = Attend::where('event_uid', $event->uid)->get();
        $categories = Category::all();
        $people = People::all();
        $posts = Post::where('user_uid', Auth::user()->uid)->get();
        return view('poster', compact('categories', 'people', 'posts', 'attends', 'event'));

    }

}
