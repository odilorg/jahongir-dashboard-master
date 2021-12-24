@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
                <div class="form-group">
                  <form action="{{ route('hotelreservations.store') }}" method="POST">
                    @csrf
                  <label for="exampleInputEmail1">Hotel City</label>
                  <input type="text" name="hotel-city" class="form-control" id="exampleInputEmail1" placeholder="Hotel City">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hotel Name</label>
                  <input type="text" name="hotel-name" class="form-control" id="exampleInputEmail1" placeholder="Hotel Name">
                </div>
                <div class="form-group">
                  <label>Check In Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="checkin-date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Check Out Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="checkout-date" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Double Rooms</label>
                  <input type="text" name="dbl" class="form-control" id="exampleInputEmail1" placeholder="Double Room Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Twin Rooms</label>
                  <input type="text" name="twn" class="form-control" id="exampleInputEmail1" placeholder="Twin Room Number">
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