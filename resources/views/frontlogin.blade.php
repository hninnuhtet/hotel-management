@extends('frontlayout')
@section('content')

<div class="container">
    <h3 class="my-3">Register</h3>
    @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
    @endif
    <form method="post" action="{{url('customer/login')}}">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Email<span class="text-danger">*</span></th>
                <td><input required type="text" class="form-control" name="email"></td>
            </tr>
            <tr>
                <th>Password<span class="text-danger">*</span></th>
                <td><input required type="password" class="form-control" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</div>

@endsection