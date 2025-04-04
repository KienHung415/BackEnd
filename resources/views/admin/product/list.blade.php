@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Bài Hát</th>
                <th>Danh mục</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 50px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key =>$product)
                <tr>
                    <td>{{$product->id }}</td>
                    <td>{{$product->name }}</td>
                    <td>{{$product->menu->name }}</td>
                    <td>{!!\App\Helpers\Helper::active($product->active) !!}</td>
                    <td>{{$product->updated_at }}</td>
                    <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                        <i class="fa-solid fa-pen-to-square">Sửa</i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" 
                        onclick="removeRow({{$product->id}},'/admin/products/destroy')">
                        <i class="fa-solid ">Xóa</i>
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}
@endsection
