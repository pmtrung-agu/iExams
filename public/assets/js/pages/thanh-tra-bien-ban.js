function chontinh(app_url){
    $(".diachi_tinh").change(function(){
        var _this = $(this);
        $.get(app_url + 'address/get/'+_this.val(), function(tinh){
            _this.closest("div").next().find(".diachi_huyen").html(tinh);
        });
    });
}

function chonhuyen(app_url){
    $(".diachi_huyen").change(function(){
        var _this = $(this);
        $.get(app_url +'address/get/'+_this.val(), function(huyen){
            _this.closest("div").next().find(".diachi_xa").html(huyen);
        });
    });
}

function ho_ten_cn_change(){
    $("#ho_ten_cn").change(function(){
        $("#ho_ten_vp").val($(this).val());
    });
}

function uploadFiles(input, fileID, path){
    var formData = new FormData($("#dinhkemform")[0]);
    $.ajax({
        url: path, type: "POST",
        cache: false, contentType: false,
        data: formData, processData:false,
        success: function(html) {
            if(html=='Failed'){
                alert('Lỗi không thể Upload đính kèm.');
            } else {
                $("#"+fileID+"-files").prepend(html);delete_file();
                $('.draggable-element').arrangeable();
            }
        },
    }).fail(function() {
        alert('Lỗi không thể Upload đính kèm.');
    });
}

function delete_file(){
    var link_delete; var _this;
    $(".delete_file").click(function(){
        link_delete = $(this).attr("href"); _this = $(this);
        $.ajax({
            url: link_delete,
            type: "GET",
            success: function(datas) {
                _this.parents("div.items").fadeOut("slow", function(){
                    $(this).remove();
                });
            }
        }).fail(function() {
            alert('Không thể xoá.');
        });
    });
}

function addFiles(){
    $(".addFiles").click(function(){
        var id = $(this).attr("name"); $("#"+id).click();
    });
}