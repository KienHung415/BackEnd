@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 50px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!!\App\Helpers\Helper::menu($menus)!!} <!-- dấu !! là nó sẽ biên dịch html, menus truyền từ MenuController-->
        </tbody>
    </table>
@endsection
