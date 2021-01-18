@extends('layout')

@section('content')
<h1>Show Project</h1>


@can('update', $project)
<a href='/projects/{{$project-> id}}/edit'>Edit</a>

@endcan

<h2>{{$project -> title}} - {{$project -> description}}</h2>
<h3>{{$project -> created_at}}</h3>
<p>
  <a href='/projects/{{$project -> id}}/edit'>
    edit me
  </a>
</p>
@if($project -> tasks -> count())
<div>
  <ul>
    @foreach($project -> tasks as $task)
    <li class="{{ $task -> completed ? 'is-complete' :''}}">{{$task -> description}}</li>

    <!-- <form method="POST" action='/tasks/{{$task-> id}}'> -->
    <form method="POST" action='/completed-tasks/{{ $task -> id }}'>
      @csrf
      @method($task -> completed ? 'DELETE' : 'POST')
      <input onChange='this.form.submit()' {{$task-> completed ? 'checked' :'' }} type='checkbox' name='completed' />
    </form>
    @endforeach
  </ul>
</div>
@else
<div>
  no tasks
</div>
@endif

<form method='POST' action='/projects/{{$project -> id}}/tasks'>
  @csrf
  <div>
    <label for='description'>
      Task Title
    </label>
    <input name='description' required />
  </div>
  <button type='submit'>Submit Task</button>
</form>

@include('errors')
@endsection