<?php

namespace App\Http\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Delete extends Component
{
    /**
     * @var Note|mixed
     */
    public $note;

    /**
     * @var bool
     */
    public bool $confirmingNoteDeletion = false;

    /**
     * Mount the component
     *
     * @param Note $note
     */
    public function mount(Note $note)
    {
        $this->note = $note;
    }

    public function confirmNoteDeletion()
    {
        $this->confirmingNoteDeletion = true;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteNote()
    {
        $this->note->delete();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.note.delete');
    }
}
