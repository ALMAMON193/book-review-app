@php
    $Message = 'Validation failed. Please check the following errors:';
@endphp
@extends('backend.master')
@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-header">Update Book</div>
    <div class="card-body">
      <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Spoof the PUT method -->

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}">
            @error('title') <!-- Display validation error for title -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author', $book->author) }}">
            @error('author') <!-- Display validation error for author -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="publisher">Publisher:</label>
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}">
            @error('publisher') <!-- Display validation error for publisher -->
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description', $book->description) }}</textarea>
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

        <div class="form-group">
          <label for="status">Status:</label>
          <select name="status" id="status" class="form-control">
              <option value="1" {{ old('status', $book->status) == '1' ? 'selected' : '' }}>Active</option>
              <option value="0" {{ old('status', $book->status) == '0' ? 'selected' : '' }}>Block</option>
          </select>
          @error('status')
          <div class="text-danger">{{ $message }}</div>
          @enderror
      </div>
      

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
