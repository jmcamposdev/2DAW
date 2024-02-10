@extends('layouts.app')

@section('content')
  <h1>Create Task</h1>
  <form method="POST" action="/tasks">
    @csrf
    <div class="form-group">
      <label for="description">Task Description</label>
      <input class="form-control" name="description" />
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Create Task</button>
    </div>
  </form>
@endsection