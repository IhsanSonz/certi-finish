<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        return view('participant.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participant = new Participant;
        $participant->name = $request->name;
        $participant->birth_date = $request->birth_date;
        $participant->save();

        return redirect()->route('participant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::find($id);
        return view('participant.edit', compact('participant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);
        $participant->name = $request->name;
        $participant->birth_date = $request->birth_date;
        $participant->save();

        return redirect()->route('participant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);
        if ($participant) {
            // Hapus semua assesments yang berkaitan
            $participant->assesments()->delete();
            $participant->delete();
        }

        return redirect()->route('participant.index');
    }
}
