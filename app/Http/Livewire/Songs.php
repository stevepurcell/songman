<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\BandMembers;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class Songs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showModal = false;
    public $songId;
    public $song;

    protected $rules = [
        'song.name' => 'required',
        'song.artist' => 'required',
        'song.time' => 'numeric',
        'song.singer' => 'nullable',
        'song.solo' => 'nullable',
        'song.keyboard' => 'nullable',
        'song.acoustic' => 'nullable',
        'song.notes' => 'nullable',
        'song.status_id' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.songs', [
            'data' => Song::paginate(15),
            'members' => BandMembers::all(),
            'statuses' => Status::all(),
        ]);
    }

    public function edit($songId)
    {
        $this->showModal = true;
        $this->songId = $songId;
        $this->song = Song::find($songId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->song = null;
        $this->songId = null;
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->songId)) {
            $this->song->save();
        } else {
            Song::create($this->song);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($songId)
    {
        $song = Song::find($songId);
        if ($song) {
            $song->delete();
        }
    }
}
