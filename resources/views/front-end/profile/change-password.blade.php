@extends('front-end.master')
@section('content')
<div class="col-8">
  <div class="card">
    <div style="background-color: rgb(14, 14, 89)" class="card-header">Change Password</div>
   <div class="p-4">
    <!-- resources/views/change_password.blade.php -->
<form method="POST" action="{{ route('profile.update.password', ['id' => $user->id]) }}">
  @csrf
  <div class="form-group">
      <label for="password">New Password</label>
      <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
  </div>

  <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  </div>

  <button type="submit" class="btn btn-primary">Change Password</button>
</form>

   </div>
  </div>
</div>
@endsection