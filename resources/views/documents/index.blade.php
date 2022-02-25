@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Documents</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Documents Upload</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      </div>
      <!-- /.row --> 
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Docs</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <div>
                <a class="btn btn-info btn-sm" href="{{ route('documents.create') }}">
                  <i class="fas fa-file">
                  </i>
                  Add new Documents
              </a>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>File</th>
   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($documents as $document )
                  <tr>
                    <td>{{ $document->document_file_name }}</td>
                   
                                       
                    <td><img src="{{ asset('storage/' . $document->document_name) }}" width="50px" height="50px" alt=""> </td>
                    
                    <td><a class="btn btn-primary btn-sm" href="documents/{{ $document->id }} }}">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                  <a class="btn btn-info btn-sm" href="documents/{{ $document->id }}/edit">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  <form action="/documents/{{ $document->id }}" method="post" class="float-left">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash">
                      </i>
                      Delete
                    </button>
                    
                      
                    
                  
                  </form>
                  </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

  



@endsection