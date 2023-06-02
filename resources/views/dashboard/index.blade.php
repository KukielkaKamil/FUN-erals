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
                @php($states = array("done" => "success",
                "in progress" => "warning",
                "ready to go" => "primary",
                ))
            @forelse ($funerals as $f)
              <tr>
                <th scope="row">{{$f->id}}</th>
                <td>{{\Carbon\Carbon::parse($f->date)->format('Y-m-d')}}</td>
                <td>{{\Carbon\Carbon::parse($f->date)->format('H:i')}}</td>
                <td><span class={{'text-'.$states[$f->status]}}>{{$f->status}}</span></td>
                <td>{{$f->cost}}</td>
                <td>{{$f->offer->name}}</td>
                <td>{{$f->client->name." ".$f->client->surname}}</td>
                <td><button type="button" class="btn btn-secondary disabled">Edit</button></td>
              </tr>
              @empty
              <tr>THERE IS NO DATA</tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
