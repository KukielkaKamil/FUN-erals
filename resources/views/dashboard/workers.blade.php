@extends('layouts.empty_dashboard')
@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col">
        <h1>Funerals</h1>
        <div class="text-right">
            <a href="#"><button type="button" class="btn btn-success center">Add worker</button></a>
        </div>
        <div class="table-responsive">
        <table class="table table-secondary table-striped border border-black">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Phone number</th>
                <th scope="col">Salary</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @forelse ($workers as $w)
              <tr>
                <th scope="row">{{$w->id}}</th>
                <td>{{$w->name}}</td>
                <td>{{$w->surname}}</td>
                <td>{{$w->phone_number}}</td>
                <td>{{$w->salary}}</td>
                <td>
                    <a href={{ route('edit.worker', ['id' => $w->id]) }}><button type="button"
                    class="btn btn-secondary disabled">Edit</button></a>
                </td>
                <td>
                    <form method="POST" action="{{ route('destroy.worker', $w->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger " value="Delete"></button>
                    </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">THERE IS NO DATA</td>
            </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop
