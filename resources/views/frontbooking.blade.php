@extends('frontlayout')
@section('content')

<div class="container">
    <h3 class="my-3">Foom Booking</h3>
    
    @if($errors->any())
    @foreach($errors->all() as $error)
        <p class="text-danger">{{$error}}</p>
    @endforeach
    @endif

    @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
    @endif

    <div class="table-responsive">
        <form method="post" enctype="multipart/form-data" action="{{url('admin/booking')}}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>CheckIn Date<span class="text-danger">*</span></th>
                <td><input type="date" name="checkin_date" class="form-control checkin-date"></td>
            </tr>
            <tr>
                <th>CheckOut Date<span class="text-danger">*</span></th>
                <td><input type="date" name="checkout_date" class="form-control"></td>
            </tr>
            <tr>
                <th>Avaiable Rooms <span class="text-danger">*</span></th>
                <td>
                    <select class="form-control room-list" name="room_id">

                    </select>
                    <p>Price: <span class="show-room-price"></span></p>
                </td>
            </tr>
            <tr>
                <th>Total Adults<span class="text-danger">*</span></th>
                <td><input type="text" name="total_adults" class="form-control"></td>
            </tr>
            <tr>
                <th>Total Children</th>
                <td><input type="text" name="total_children" class="form-control"></td>
            </tr>                    
            <tr>
                <td colspan="2">                    
                    <input type="hidden" name="customer_id" value="{{session('data')[0]->id}}">
                    <input type="hidden" name="roomprice" class="room-price" value="" />
                    <input type="hidden" name="ref" value="front">
                    <input type="submit" class="btn btn-primary">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".checkin-date").on('blur', function(){
            var _checkindate = $(this).val();
            //Ajax
            $.ajax({
                url: "{{url('admin/booking')}}/available_rooms/" + _checkindate,
                dataType: "json",
                beforeSend: function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success: function (res) {
                    var _html = '';
                    console.log(res.data);
                    $.each(res.data, function(index,row){
                        _html += '<option data-price="'+row.roomtype.price+'" value="'+ row.room.id +'">'+ row.room.title +'-'+row.roomtype.title+'</option>';
                    });
                    $(".room-list").html(_html);
                    
                }
            });
        });

        $(document).on("change",".room-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".show-room-price").text(_selectedPrice);
            $(".room-price").val(_selectedPrice);
        });

    });

</script>

@endsection