<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function store(Request $request)
    {

        try {
            $request->validate([
                'postuid' => 'required',
                'message' => 'required',
                'reason' => 'required',
            ]);

            Report::create([
                'post_uid' => $request['postuid'],
                'message' => $request['message'],
                'reason_uid' => $request['reason'],
                'user_uid' => Auth::user()->uid,

            ]);
        } catch (\Exception $e) {
            return redirect()->route('publisher')->with('error', 'Error sending report: ' . $e->getMessage());
        }


        return redirect()->route('publisher')->with('success', 'Report sent successfully');
    }

    function show($id)
    {
        $reps = Report::orderBy('state', 'asc')->get();
        $rep = Report::where('uid', $id)->first();
        return view('admin.reports', compact('reps', 'rep'));
    }

    function aceptRep($id)
    {
        Report::where('uid', $id)->update(['state' => 1]);
        return redirect()->route('admin.reports')->with('success', 'Report accepted');
    }

    function declineRep($id)
    {
        Report::where('uid', $id)->update(['state' => 2]);
        return redirect()->route('admin.reports')->with('success', 'Report declined');
    }


}
