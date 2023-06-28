@extends('layouts.empty_dashboard')
@section('content')
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="container mt-5 mb-5">
                    @if (session('error'))
                        <div class="row d-flex justify-content-center">
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        </div>
                    @endif
                    <h1>Funeral info</h1>

                    @if ($errors->any())
                        <div class="row d-flex justify-content-center">
                            <div class="col-6">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="container">
                        <form method="POST" action="{{ route('update.funeral', $funeral->id) }}" class="needs-validation">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date"
                                    aria-describedby="dateHelp"
                                    value="{{ \Carbon\Carbon::parse($funeral->date)->format('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" name="time" id="time"
                                    value="{{ \Carbon\Carbon::parse($funeral->date)->format('H:i') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input type="number" step=".01" class="form-control" name="cost" id="cost"
                                    value={{ $funeral->cost }} required>
                            </div>
                            <div class="mb-3">
                                <label for="offer_id" class="form-label">Offer</label>
                                <select class="form-select" name="offer_id" id="offer_id" required>
                                    @forelse ($offers as $offer)
                                        <option @if ($funeral->offer->id == $offer->id) selected @endif value={{ $offer->id }}>
                                            {{ $offer->name }}</option>
                                    @empty
                                        <option value='0'>There are no offerts</option>
                                    @endforelse
                                </select>
                            </div>
                            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse"
                                data-bs-target="#workersSelection" aria-expanded="false" aria-controls="workersSelection">
                                Select workers <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="collapse" id="workersSelection">
                                <div class="card card-body">
                                    <div class="list-group">
                                        @php
                                            $dates = [];
                                            $workerCount = 0;
                                            $durations = [];
                                        @endphp
                                        @forelse ($workers as $worker)
                                            <label class="list-group-item">
                                                <input class="form-check-input me-1" name="workers[]" id="workersCheck"
                                                    type="checkbox" value="{{ $worker->id }}"
                                                    @if ($worker->funeral->contains($funeral->id)) checked @endif
                                                    @if ($worker->isOccupied($funeral)) onclick="return false;" @endif>
                                                {{ $worker->name . ' ' . $worker->surname }}
                                            </label>
                                            @php
                                                array_push($dates, []);
                                            @endphp
                                            @forelse ($worker->funeral as $f)
                                                @php
                                                    if ($f->id == $funeral->id) {
                                                        continue;
                                                    }
                                                    array_push($dates[$workerCount], [$f->date, $f->getEndDate()->format('Y-m-d H:i:s')]);
                                                @endphp
                                            @empty
                                            @endforelse
                                            @php
                                                $workerCount += 1;
                                            @endphp
                                        @empty
                                            <label class="list-group-item">
                                                <input class="form-check-input me-1" type="checkbox" value="">
                                                There are no available workers
                                            </label>
                                        @endforelse
                                        @forelse ($offers as $o)
                                            @php
                                                $durations[$o->id] = $o->duration;
                                            @endphp
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="mt-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script>
            const workers = document.querySelectorAll("#workersCheck");
            const data = @json($dates);
            const durations = @json($durations);
            const date_field = document.getElementById('date');
            const time_field = document.getElementById('time');
            const offer_field = document.getElementById('offer_id');

            function isOverlaping(start1, end1) {
                let f_date = date_field.value + " " + time_field.value + ":00";
                console.log(f_date);
                start1 = new Date(start1);
                end1 = new Date(end1);
                const start2 = new Date(f_date);
                let duration = durations[offer_field.value];
                var timeParts = duration.split(":");
                var hours = parseInt(timeParts[0], 10);
                var minutes = parseInt(timeParts[1], 10);
                let end2 = new Date(f_date);
                end2.setHours(end2.getHours() + hours);
                end2.setMinutes(end2.getMinutes() + minutes);
                return (start1 <= end2) && (end1 >= start2);
            }

            function isOccupied() {
                let f_date = date_field.value + " " + time_field.value + ":00";
                counter = 0;
                workers.forEach(function(worker) {
                    for (let j = 0; j < data[counter].length; j++) {
                        if (isOverlaping(data[counter][j][0], data[counter][j][1])) {
                            worker.disabled = true;
                            let label = worker.parentElement;
                            label.style.color = 'gray';
                            label.style.textDecoration = "line-through";

                            counter++;
                            return;
                        }
                    }
                    worker.disabled = false;
                    let label = worker.parentElement;
                    label.style.color = 'black';
                    label.style.textDecoration = "none";
                    counter++;

                });
            }

            date_field.addEventListener('input', isOccupied);
            time_field.addEventListener('input', isOccupied);
            offer_field.addEventListener('input', isOccupied);
        </script>
    @stop
