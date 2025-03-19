$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//mục đích của hàm này là giúp xóa dữ liệu trên trang web mà không cần tải lại trang 
//Sử dụng AJAX để gửi yêu cần xóa đến server
// Hiển thị thông báo đến người dùng


// Xóa
function removeRow(id,url){//hàm này nhận 2 tham số 
    if(confirm('Xóa mà không thể khôi phục.Bạn có chắc ?')){ //mở hộp thoại
        $.ajax({ // gửi yêu cầu xóa bằng AJAX
            type:'DELETE',//  Gửi yêu cầu xóa (DELETE request)
            datatype:'JSON',//hận dữ liệu dưới dạng JSON
            data:{id},// Gửi ID của dữ liệu cần xóa
            url:url,// đường dẫn API
            success:function(result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}

//Upload File
$('#upload').change(function(){
    const form=new FormData();
    form.append('file',$(this)[0].files[0]);
    
    $.ajax({

        processData:false,
        contentType:false,
        type:'POST',
        dataType:'JSON',
        data: form,
        url:'/admin/upload/services',
        success: function(results) {
            if(results.error == false){
                $('#image_show').html('<a href="'+results.url+'"target="_blank">'+
                    '<img src="'+results.url+'" width="100px"></a>');

                $('#thumb').val(results.url);//
            }else{
                alert('Upload File Lỗi ');
            }
        }
    }); 

});
//Upload file nhạc
$('#audio_file').change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/audios',
        success: function(results) {
            if (results.error == false) {
                $('#audio_show').html('<audio controls>' +
                    '<source src="' + results.url + '" type="audio/mpeg">' +
                    'Trình duyệt của bạn không hỗ trợ phát nhạc.' +
                    '</audio>');
                $('#file_path').val(results.url);
            } else {
                alert('Upload File Lỗi');
            }
        }
    });
});