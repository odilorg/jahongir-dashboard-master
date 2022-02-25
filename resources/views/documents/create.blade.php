@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload new Document</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload new Document</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Tour Group</label>
                                    <select class="custom-select rounded-0" name="tourgroup_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Tour Group..</option>
                                        @foreach ($tourgroups as $tourgroup )
                                        <option {{ old('tourgroup_id') == $tourgroup->id ? "selected" : "" }}
                                            value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tourgroup_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Document Name</label>
                                    <input type="text" value="{{ old('document_file_name') }}" name="document_file_name" class="form-control  @error('document_file_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Document Name">
                                    @error('document_file_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Document file Upload</label>
                                  <input type="file" value="{{ old('document_name') }}" name="document_name" class="form-control @error('document_name')
                {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" >
                                  @error('document_name')
                                  <p class="text-danger">{{ $message }}</p>
                                  @enderror
                              </div>


                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-6 -->



            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>



@endsection
