<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Traits\HasUuid;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Create a new instance of the specified resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $newNote = $this->createNote();
        return redirect($newNote->show_link);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Note $note
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Note $note, Request $request)
    {
        $this->authorize('view', $note);

        if (HasUuid::adjustShowURLSlug($note, $request)) {
            return redirect($note->show_link);
        }

        return view('pages.editor', compact('note'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Note $note
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function read(Note $note, Request $request)
    {
        if (! $note->shared) abort(404);

        if (HasUuid::adjustShowURLSlug($note, $request)) {
            return redirect($note->read_link);
        }

        return view('pages.reader', compact('note'));
    }

    /**
     * Create a new blank note
     *
     * @return Note|\Illuminate\Database\Eloquent\Model
     */
    private function createNote()
    {
        return Note::create([
            'user_id' => \Auth::user()->id,
            'title' => 'Untitled Note',
            'contents' => '',
            'uuid' => Controller::uuid() ?: date('Ymdhis')
        ]);
    }
}
