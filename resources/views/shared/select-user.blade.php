<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
    aria-expanded="false" aria-controls="collapseExample">
    Select workers
</button>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="list-group">
            @forelse ($workers as $worker)
                <label class="list-group-item">
                    <input class="form-check-input me-1" name="workers[]" type="checkbox" value="{{ $worker->id }}"
                        @if ($worker->funeral->contains($funeral->id)) checked @endif
                        @if ($worker->isOccupied($funeral)) onclick="return false;" @endif>
                    {{ $worker->name . ' ' . $worker->surname }}
                </label>
            @empty
                <label class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" value="">
                    There are no available workers
                </label>
            @endforelse
        </div>
    </div>
</div>
