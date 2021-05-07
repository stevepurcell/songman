<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SongList;

class ShowLists extends Component
{

    public $showModal = false;
    public $songlistId;
    public $songlist;

    public function render()
    {
        return view('livewire.show-lists', [
            'data' => $this->read(),
        ]);
    }

    public function read()
    {
        return SongList::orderby('id')->get();
    }

    public function create()
    {
        $this->showModal = true;
        $this->songlist = null;
        $this->songlistId = null;
    }

    public function close()
    {
        $this->showModal = false;
    }
}
