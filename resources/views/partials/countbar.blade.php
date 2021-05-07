<div class="row">
    @forelse ($data as $status)
    <div class="col-6 col-lg-3">
        <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-{{ getStatusBadge($status->id) }} py-4 px-5 mfe-3">
                    <h4>{{ getStatusCount($status->id) }}</h4>
                </div>
                <div>
                    <div class="text-value text-{{ getStatusBadge($status->id) }}"><h4>{{ $status->name }}</h4></div>
                </div>
            </div>
        </div>
    </div>
    @empty
@endforelse
    
</div>