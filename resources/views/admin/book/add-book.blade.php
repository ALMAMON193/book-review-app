
@php
    $Message = 'Validation failed. Please check the following errors:';
@endphp
@extends('backend.master')
@section('content')


<div class="container-fluid">
  <div class="card">
    <div class="card-header">Add Book</div>
    <div class="card-body">
      <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
        @csrf <!-- Add CSRF token -->
    
        <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" name="Title" class="form-control" id="Title" value="{{ old('Title') }}">
            @error('Title') <!-- Display validation error for Title -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            @error('author') <!-- Display validation error for author -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="publisher">Publisher:</label>
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ old('publisher') }}">
            @error('publisher') <!-- Display validation error for publisher -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            @error('description') <!-- Display validation error for description -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="cover_image">Cover Image:</label>
            <input type="file" class="form-control" id="cover_image" name="cover_image">
            @error('cover_image') <!-- Display validation error for cover image -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    </div>
  </div>
</div>
@endsection