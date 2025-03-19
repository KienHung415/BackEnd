@extends('admin.main')


@section('content')
<form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label for="song_name">Tên Bài Hát</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên bài hát" required>
        </div>

        <div class="form-group">
            <label>Tên Nghệ Sĩ</label>
            <input type="text" name="artist" value="{{old('artist')}}" class="form-control" placeholder="Nhập tên nghệ sĩ" required>
        </div>


        <div class="form-group">
                    <label >Danh Mục</label>
                    <select class="form-control" name="menu_id">
                        @foreach($menus as $menu)
                          <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                  </div>


        <div class="form-group">
            <label>Mô Tả Ngắn</label>
            <textarea name="description" class="form-control">{{old('description')}}</textarea>
        </div>

        <div class="form-group">
            <label>Upload File Nhạc</label>
            <input type="file" name="file" class="form-control" id="audio_file">
            <div id="audio_show">

            </div>
            <input type="hidden" name="file_path" id="file_path">
        </div>

        <div class="form-group">
            <label for="menu">Hình Ảnh</label>
            <input type="file" name="file" class="form-control"  id="upload">
            <div id="image_show">

            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>

        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>
    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm Bài Hát</button>
    </div>
    @csrf 
</form>
@endsection

@section('footer')
@endsection
