<?php

namespace App\Http\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Reader extends Component
{
    /**
     * Instance of Note model
     *
     * @var Note|mixed
     */
    public $note;

    /**
     * @var mixed|string
     */
    public $contents;

    public string $password = '';

    public bool $unlocked = true;

    protected $rules = [
        'password' => 'required_if:unlocked,false|string|nullable',
    ];

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->contents = $note->contents;
        if (isset($note->password)) {
            $this->unlocked = false;
        }
    }

    public function unlock()
    {
        $this->validate();
        if (\Hash::check($this->password, $this->note->password)) {
            $this->unlocked = true;
        } else {
            $this->addError('password', 'Wrong password');
        }
    }

    public function render()
    {
        return view('livewire.note.reader');
    }
}
