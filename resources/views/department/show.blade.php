@extends('layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$data->title}} Department
                <a href="{{url('admin/department')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{$data->title}}</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>{{$data->detail}}</textarea></td>
                    </tr>
                </table>
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