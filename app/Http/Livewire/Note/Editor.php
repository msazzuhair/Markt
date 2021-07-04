<?php

namespace App\Http\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Editor extends Component
{
    /**
     * Instance of Note model
     *
     * @var Note|mixed
     */
    public $note;

    public $contents;

    protected $rules = [
        'contents' => 'string',
    ];

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->contents = $note->contents;
    }

    /**
     * @param string $contents
     */
    public function modifyContents(string $contents)
    {
        $this->contents = $contents;
        $this->note->contents = $this->contents;
        $this->note->save();

        $this->emit('saved');
    }

    /**
     * Render the component
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.note.editor');
    }
}
