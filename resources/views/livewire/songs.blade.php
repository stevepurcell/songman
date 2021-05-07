<div>
<a wire:click.prevent="create" href="#" class="btn btn-primary m-2">New Song</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Artist</th>
      <th scope="col">Status</th>
      <th scope="col">Created By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($data as $item)
            <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->artist }}</td>
            <td><span class="badge badge-{{getStatusBadge($item->status_id)}}">{{ $item->status->name }}</span></td>
            <td>{{ getUsername($item->created_by) }}</td>
            <td class="">
                    <button class="btn btn-sm btn-primary"
                        wire:click.prevent="edit({{ $item->id }})">Edit
                    </button>
                    <button class="btn btn-sm btn-danger"
                        wire:click.prevent="delete({{ $item->id }})"
                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No Songs found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

    {!! $data->links() !!}

    <div class="modal" @if ($showModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $songId ? 'Edit Song' : 'Add New Song' }}</h5>
                        <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label font-weight-bold">Name:</label>
                        <div class="col-sm-10">
                            <input wire:model="song.name" class="form-control" id="name">
                            @error('song.name')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="artist" class="col-sm-2 col-form-label font-weight-bold">Artist:</label>
                        <div class="col-sm-10">
                            <input wire:model="song.artist" class="form-control" id="artist">
                            @error('song.artist')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="artist" class="col-sm-2 col-form-label font-weight-bold">Status:</label>
                        <div class="col-sm-10">
                            <select wire:model="song.status_id" class="form-control">
                                <option value="">-- choose status --</option>
                                @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('song.status')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label font-weight-bold">Time:</label>
                        <div class="col-sm-10">
                            <input wire:model="song.time" class="form-control" id="time">
                            @error('song.time')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="artist" class="col-sm-2 col-form-label font-weight-bold">Singer:</label>
                        <div class="col-sm-10">
                            <select wire:model="song.singer" class="form-control">
                                <option value="">-- choose singer --</option>
                                @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                            @error('song.singer')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="solo" class="col-sm-2 col-form-label font-weight-bold">Solo:</label>
                        <div class="col-sm-10">
                            <select wire:model="song.solo" class="form-control">
                                <option value="">-- choose soloist --</option>
                                @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                            @error('song.solo')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="solo" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" wire:model="song.keyboard" id="keyboard" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Keyboard</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" wire:model="song.acoustic" id="acoustic" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Acoustic</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label font-weight-bold">Notes:</label>
                        <div class="col-sm-10">
                            <input wire:model="song.notes" class="form-control" id="time">
                            @error('song.notes')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $songId ? 'Save Changes' : 'Save' }}</button>
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

