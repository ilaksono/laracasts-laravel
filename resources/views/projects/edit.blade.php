@extends('layout')

@section('content')
<h1>Edit Project</h1>

<h2>{{$project ->title}} - {{$project -> description}} </h2>

<form class='form' method='POST' action='/projects/{{$project -> id}}'>
  {{method_field('PATCH')}}
  {{csrf_field()}}
  <div>
    <input name='title' placeholder='title' value='{{ $project -> title }}' />
  </div>

  <div>
    <textarea name='description' placeholder='description'>
      {{ $project -> description}}

      </textarea>

  </div>
  <button type='submit'>
    Submit
  </button>
</form>

<form method='POST' action='/projects/{{ $project -> id}}'>
  @method('DELETE')
  @csrf

  <button type='submit'>Delete Project</button>
</form>

@include('errors')
@endsection