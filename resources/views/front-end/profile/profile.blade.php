@extends('front-end.master')
@section('content')
<div class="col-8">
  <div class="card">
    <div style="background-color: rgb(14, 14, 89)" class="card-header">Profile Details</div>
   <div class="p-4">
    <form>
      <div class="form-group">
        <label for="name">Name <strong class="text-danger">*</strong></label>
        <input type="email" name="name" class="form-control" value="{{ $user->name }}">
      </div>
      <div class="form-group">
        <label for="email">Email:<strong class="text-danger">*</strong></label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
      </div>
      <div class="form-group">
        <label for="file">Profile:<strong class="text-danger">*</strong></label>
        <input type="file" class="form-control" name="image" id="image">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>
  </div>
</div>
@endsection