@extends('layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Roomtypes
                <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif

            <div class="table-responsive">
                <form enctype="multipart/form-data" action="{{url('admin/staff/'.$data->id)}}" method="POST">
                    @csrf
                    @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td><input type="text" name="full_name" class="form-control" value="{{$data->full_name}}"></td>
                    </tr>
                    <tr>
                        <th>Select Department</th>
                        <td>
                            <select name="department_id" class="form-control">
                                <option value="0">--- Select ---</option>
                                @foreach($departments as $department)
                                <option @if($data->department_id==$department->id) selected @endif value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>                    
                    <tr>
                        <th>Photo</th>
                        <td>
                            <input type="file" name="photo" class="form-control" >
                            <input type="hidden" value="{{$data->photo}}" name="prev_photo">
                            <img src="{{asset($data->photo)}}">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td><textarea name="bio" class="form-control" >{{$data->bio}}</textarea></td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>
                            <input @if($data->salary_type=='daily') checked @endif type="radio" name="salary_type" value="daily">Daily
                            <input @if($data->salary_type=='monthly') checked @endif type="radio" name="salary_type" value="monthly">Monthly
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td><input type="number" name="salary_amt" class="form-control" value="{{$data->salary_amt}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">

<!-- Page level plugins -->
<script src="{{ asset("vendor/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset("js/demo/datatables-demo.js") }}"></script>

@endsection
@endsection