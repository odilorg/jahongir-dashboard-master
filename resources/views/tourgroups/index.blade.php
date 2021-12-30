@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hotel Reservations</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Hotel Reservations</li>
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
              <h3 class="card-title">Group Jp-0154 Japan from 01/05-10/05/2022</h3>
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
                <a class="btn btn-info btn-sm" href="{{ route('hotelreservations.create') }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Add Hotel Reservation
              </a>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>City</th>
                    <th>Hotel Name</th>
                    <th>CI Date</th>
                    <th>CI Date</th>
                    <th>Early CI Time</th>
                    <th>Late CO Time</th>
                    <th>Tour Gr</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tourgroups as $item )
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->hotel_city }}</td>
                    <td>{{ $item->hotel_name }}</td>
                    <td><span class="tag tag-success">{{ $item->checkin_date }}</span></td>
                    <td>{{ $item->checkout_date }}</td>
                    <td>{{ $item->early_checkin }}</td>
                    <td>{{ $item->late_checkout }}</td>
                    <td>{{ $item->tourgroup_name }}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{ route('hotelreservations.show', ['hotelreservation' =>1]) }}">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                  <a class="btn btn-info btn-sm" href="hotelreservations/{{ $item->id }}/edit">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  <form action="/hotelreservations/{{ $item->id }}" method="post" class="float-left">
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