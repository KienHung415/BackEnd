@extends('admin.main')


@section('content')
<form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label for="song_name">Tên Bài Hát</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nhập tên bài hát" required>
        </div>

        <div class="form-group">
            <label>Tên Nghệ Sĩ</label>
            <input type="text" name="artist" value="{{$product->artist}}" class="form-control" placeholder="Nhập tên nghệ sĩ" required>
        </div>


        <div class="form-group">
                    <label >Danh Mục</label>
                    <select class="form-control" name="menu_id">
                        @foreach($menus as $menu)
                          <option value="{{$menu->id}}" {{$product->menu_id == $menu->id ? 'selected':'' }}>
                            {{$menu->name}}
                          </option>
                        @endforeach
                    </select>
                  </div>


        <div class="form-group">
            <label>Mô Tả Ngắn</label>
            <textarea name="description" class="form-control">{{$product->description}}</textarea>
        </div>

        <div class="form-group">
            <label>Upload File Nhạc</label>
            <input type="file" name="file" class="form-control" id="audio_file">
            <div id="audio_show">
            @if (!empty($product->file_path))
                <audio controls>
                    <source src="{{ $product->file_path }}" type="audio/mpeg">
                     Trình duyệt của bạn không hỗ trợ phát nhạc.
                </audio>
            @endif
            </div>
            <input type="hidden" name="file_path" value="{{$product->file_path}}" id="file_path">
        </div>

        <div class="form-group">
            <label for="menu">Hình Ảnh</label>
            <input type="file" name="file" class="form-control"  id="upload">
            <div id="image_show">
                <a href="{{$product->thumb}}" target="_blank">
                    <img src="{{$product->thumb}}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" value="{{$product->thumb}}" id="thumb">
        </div>

        <div class="form-group">
            <label>Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
                    {{$product->active==1 ? 'checked=""':''}}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                {{$product->active==0 ? 'checked=""':''}}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>
    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Bài Hát</button>
    </div>
    @csrf 
</form>
@endsection

@section('footer')
@endsection
