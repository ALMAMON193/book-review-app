@extends('backend.master')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Author</th>
                          <th>publisher</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
               @foreach ($books as $book )

               <tbody>
                <tr>
                    <td>
                        <img src="data:image/jpeg;base64,{{ base64_encode($book->cover_image) }}" alt="Book Cover" style="max-width: 100px; max-height: 100px;">
                    </td>
                    
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        
                        <a href="{{ route('book.edit',$book->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('book.delete',$book->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
               
               
            </tbody>
                   
               @endforeach
              </table>
          </div>
      </div>
  </div>

</div>
@endsection

