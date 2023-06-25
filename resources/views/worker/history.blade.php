@extends('layouts.empty_dashboard')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1>Funerals History</h1>
                <div class="table-responsive">
                    <table class="table table-secondary table-striped border border-black">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Type</th>
                                <th scope="col">Client</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($funerals as $f)
                                    <tr>
                                        <th scope="row">{{ $f->id }}</th>
                                        <td>{{ \Carbon\Carbon::parse($f->date)->format('Y-m-d') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($f->date)->format('H:i') }}</td>
                                        <td>{{ $f->offer->name }}</td>
                                        <td><a href={{ route('show.client', ['id' => $f->client->id]) }}>
                                                {{ $f->client->name . ' ' . $f->client->surname }}</a></td>
                                    </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">THERE IS NO DATA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
