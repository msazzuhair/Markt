<?php

namespace App\Http\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Title extends Component
{
    /**
     * Instance of Note model
     *
     * @var Note|mixed
     */
    public $note;

    /**
     * @var string
     */
    public string $title = '';

    /**
     * @var bool
     */
    public bool $editing = false;

    /**
     * Livewire validation rules
     *
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|string|max:255',
        'editing' => 'boolean'
    ];

    /**
     * @var string[]
     */
    protected $listeners = [
        'saved' => 'onContentsSaved',
    ];

    /**
     * Mount the component
     *
     * @param Note $note
     */
    public function mount(Note $note)
    {
        $this->note = $note;
        $this->title = $note->title;
    }

    public function save()
    {
        $this->validate();

        $this->note->title = $this->title;
        $this->note->save();

        $this->editing = false;

    }

    public function cancel()
    {
        $this->editing = false;
        $this->title = $this->note->title;
    }

    public function onContentsSaved()
    {
        $this->note->refresh();
    }

    /**
     * Render the component
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.note.title');
    }
}
