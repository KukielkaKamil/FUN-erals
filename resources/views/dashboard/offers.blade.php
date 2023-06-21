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
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Duration</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($offers as $o)
              <tr>
                <th scope="row">{{$o->id}}</th>
                <td>{{$o->name}}</td>
                <td>{{strlen($o->description) > 30 ? substr($o->description,0,30).'...' : $o->description;}}</td>
                <td>{{$o->price}}</td>
                <td>{{ \Carbon\Carbon::parse($o->duration)->format('H:i') }}</td>
                <td>
                    <a href={{ route('edit.offer', ['id' => $o->id]) }}><button type="button"
                        class="btn btn-secondary disabled">Edit</button></a>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center">THERE IS NO DATA</td>
            </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
