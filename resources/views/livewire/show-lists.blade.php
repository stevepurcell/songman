<div>
<a wire:click.prevent="create" href="#" class="btn btn-primary m-2">New Songlist</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Creator</th>
      <th scope="col">Access</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        @forelse ($data as $item)
            <tr>
            <td>{{ $item->name }}</td>
            <td>{{ getUsername($item->creator) }}</td>
            <td><span class="badge badge-{{ getAccessBadge($item->private)['badge_type']}}">
                {{ getAccessBadge($item->private)['accesstype'] }}</span></td>
            <td>{{ $item->created_at->diffForHumans() }}</td>
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

    <div class="modal" @if ($showModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $songlistId ? 'Edit Song' : 'Add New Song' }}</h5>
                        <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label font-weight-bold">Name:</label>
                        <div class="col-sm-8">
                            <input wire:model="song.name" class="form-control" id="name">
                            @error('song.name')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="artist" class="col-sm-3 col-form-label font-weight-bold">Creator:</label>
                        <div class="col-sm-8">
                            <input wire:model="song.artist" class="form-control" id="artist">
                            @error('song.artist')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="solo" class="col-sm-2 col-form-label font-weight-bold">Access:</label>
                        <div class="col-sm-10">
                            
                            @error('song.solo')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $songlistId ? 'Save Changes' : 'Save' }}</button>
                        <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
