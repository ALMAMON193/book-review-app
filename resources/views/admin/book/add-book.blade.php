@extends('backend.master')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">Add Book</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <label for="usr">Title:</label>
          <input type="text" name="Title" class="form-control" id="Title">
        </div>
        <div class="form-group">
          <label for="pwd">author:</label>
          <input type="author" class="form-control" name="author" id="author">
        </div>
        <div class="form-group">
          <label for="pwd">publisher:</label>
          <input type="publisher" class="form-control" name="publisher" id="publisher">
        </div>
        
        <div class="form-group">
          <label for="pwd">description:</label>
          <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="pwd">status:</label>
          <input type="status" class="form-control" id="pwd">
        </div>
        <div class="form-group">
          <label for="pwd">cover_image:</label>
          <input type="file" class="form-control" id="cover_image" name="cover_image">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection