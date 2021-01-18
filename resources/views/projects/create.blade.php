<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<style>

  .is-danger {
    border:2px solid red;
  }
</style>

</head>

<body>

  <h1>Create a new Project</h1>

  <form method='POST' action='/projects'>
    {{csrf_field()}}
    <div>

      <input 
      value="{{ old('title')}}"
      required type='text' name='title' 
      class="{{$errors-> has('title') ? 'is-danger' :'input'}}"
      placeholder='project title' />
    </div>
    <div>

      <textarea 
        class="{{$errors -> has('description') ? 'is-danger' :''}}"
      required=true name='description'></textarea>
    </div>

    <button type='submit'>Submit</button>

  </form>
  @include('errors')
</body>

</html>