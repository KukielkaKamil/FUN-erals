@extends('layouts.empty_dashboard')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h1>Funerals</h1>
                <div class="table-responsive">
                    <table class="table table-secondary table-striped border border-black">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Type</th>
                                <th scope="col">Client</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($states = ['done' => 'success', 'in progress' => 'warning', 'prepared' => 'primary'])
                            @forelse ($funerals as $f)
                                @php($status = $f->getStatus())
                                <tr>
                                    <th scope="row">{{ $f->id }}</th>
                                    <td>{{ \Carbon\Carbon::parse($f->date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($f->date)->format('H:i') }}</td>
                                    <td><span class={{ 'text-' . $states[$status] }}>{{ $status }}</span></td>
                                    <td>{{ $f->cost }}</td>
                                    <td>{{ $f->offer->name }}</td>
                                    <td><a href={{route('show.client',['id' => $f->client->id])}}>
                                        {{ $f->client->name . ' ' . $f->client->surname }}</a></td>
                                    <td>
                                        {{-- @if (strcmp($status, 'in progress') != 0) --}}
                                            <a href={{ route('edit.funeral', ['id' => $f->id]) }}><button type="button"
                                                    class="btn btn-secondary">Edit</button></a>
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('destroy.funeral', $f->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Delete"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">THERE IS NO DATA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
