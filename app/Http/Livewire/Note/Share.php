<?php

namespace App\Http\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Share extends Component
{
    /**
     * @var Note|mixed
     */
    public $note;

    /**
     * @var bool
     */
    public bool $confirmingNoteSharing = false;

    /**
     * @var mixed|string|null
     */
    public $password;

    /**
     * @var string[]
     */
    protected $rules = [
        'password' => 'string|nullable',
    ];

    /**
     * Mount the component
     *
     * @param Note $note
     */
    public function mount(Note $note)
    {
        $this->note = $note;
    }

    public function confirmNoteSharing()
    {
        $this->confirmingNoteSharing = true;
    }

    public function shareNote()
    {
        $this->validate();

        $this->note->shared = true;
        if (! empty($this->password)) {
            $this->note->password = \Hash::make($this->password);
        }
        $this->note->save();

        $this->password = null;

        $this->confirmingNoteSharing = false;
    }

    public function removePassword()
    {
        $this->note->password = null;
        $this->note->save();

        $this->password = null;

        $this->dispatchBrowserEvent('password-reset');
    }

    public function disableSharing()
    {
        $this->note->shared = false;
        if (! empty($this->password)) {
            $this->note->password = \Hash::make($this->password);
        }
        $this->note->save();

        $this->password = null;

        $this->confirmingNoteSharing = false;
    }

    public function render()
    {
        return view('livewire.note.share');
    }
}
