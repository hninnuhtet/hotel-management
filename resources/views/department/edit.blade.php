@extends('layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update {{$data->title}}
                <a href="{{url('admin/department')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif

            <div class="table-responsive">
                <form action="{{url('admin/department/'.$data->id)}}" method="POST">
                    @csrf
                    @method('put')
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td><input type="text" name="title" class="form-control" value="{{$data->title}}"></td>
                    </tr>                
                    <tr>
                        <th>Detail</th>
                        <td><textarea name="detail" class="form-control">{{$data->detail}}</textarea></td>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(".delete-image").on('click', function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
            $.ajax({
                url: "{{url('admin/roomtypeimage/delete')}}/"+_img_id,
                dataType: 'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success: function (res) {
                    if(res.bool==true){
                    $(".imgcol"+_img_id).remove();
                    }
                    _vm.removeClass('disabled');
                }
            });
        });
    });

</script>
@endsection

@endsection
@endsection