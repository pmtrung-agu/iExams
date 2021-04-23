function upload_hinhanh(path = ''){
    $(".dinhkem").change(function() {
        var formData = new FormData($("#dinhkemform")[0]);$("#progressbar").show();
        $.ajax({
            url: path, type: "POST",
            cache: false, contentType: false,
            data: formData, processData:false,
            xhr: function(){
                //upload Progress
                var xhr = $.ajaxSettings.xhr();
                if(xhr.upload) {
                    xhr.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar
                        $(".progress .progress-bar").css("width", + percent +"%");
                        $(".progress .progress-bar").text(percent +"%");
                        if(percent == 100){
                            $("#progressbar").fadeOut();
                        }
                    }, true);
                }
                return xhr;
            },
            success: function(datas) {
                if(datas=='Failed'){
                    alert('Lỗi không thể Upload hình ảnh.');
                } else {
                    $("#list_hinhanh").prepend(datas);
                    $('.draggable-element').arrangeable();
                    popup_images();delete_hinhanh();
                    //editImage();
                }
            },
            cache: false, contentType: false, processData: false
        }).fail(function() {
            alert('Lỗi không thể Upload hình ảnh.');
        });
    });
}
function upload_files(path){
    $(".dinhkem_files").change(function() {
      var formData = new FormData($("#dinhkemform")[0]);$("#progressbar").show();
      $.ajax({
        url: path, type: "POST",
        cache: false, contentType: false,
        data: formData, processData:false,
        xhr: function(){
                //upload Progress
                var xhr = $.ajaxSettings.xhr();
                if(xhr.upload) {
                    xhr.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar
                        $(".progress .progress-bar").css("width", + percent +"%");
                        $(".progress .progress-bar").text(percent +"%");
                        if(percent == 100){
                            $("#progressbar").fadeOut();
                        }
                    }, true);
                }
                return xhr;
            },
          success: function(datas) {
              if(datas=='Failed'){
                  alert('Lỗi không thể Upload tập tin.');
              } else {
                $("#list_files").prepend(datas);delete_file();
                $('.draggable-element').arrangeable();
              }
          },
          cache: false, contentType: false, processData: false
        }).fail(function() {
            alert('Lỗi không thể Upload tập tin.');
        });
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
function delete_hinhanh(){
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
            //alert('Không thể xoá.');
            _this.parents("div.items").fadeOut("slow", function(){
                $(this).remove();
            });
        });
    });
}
function chontinh(app_url){
    $("#address_1").change(function(){
        $.get(app_url + 'admin/danh-muc/dia-chi/get/'+$(this).val(), function(tinh){
            $("#address_2").html(tinh);chonhuyen();
        });
    });
}

function chonhuyen(app_url){
    $("#address_2").change(function(){
        $.get(app_url +'admin/danh-muc/dia-chi/get/'+$(this).val(), function(huyen){
            $("#address_3").html(huyen);
        });
    });
}
function popup_images(){
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
}

function convertToSlug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }
  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes
  return str;
}

function DonViCungCapAutoComplete(path){
    $("#donvicungcap").autocomplete({
        serviceUrl: path,
        dataType: 'json',
        paramName: 'search',
        type: "GET",
        onSelect: function (suggestion) {
            $(this).val(suggestion.data);
        }
    });
}

function ngaythangnam(){
    jQuery('.ngaythangnam').change(function(){
        var _this = $(this);
        var val = _this.val();
        val =  val.split('.').join('/');
        val =  val.split('-').join('/');
        val =  val.split('\\').join('/');
        if(val.length == 4) {
            _this.val(val);
        } else if(val.includes("/", 2) && val.includes("/", 5)){
            var a = val.split('/');
            if(parseInt(a[0]) > 31 || parseInt(a[0]) <= 0  ){
                alert('Ngày nhập sai ['+ a[0] +'] nên chuyển sang 31');a[0] = 31;
            }
            if(parseInt(a[1]) > 12 || parseInt(a[1]) <= 0){
                alert('Tháng nhập sai ['+ a[1] +'] nên chuyển sang 12');a[1] = 12;
            }
            if(a[2].length <= 2){
                if(parseInt(a[2]) > 20){
                    a[2] = '19' + a[2];
                } else {
                    a[2] = '20' + a[2];
                }
            }
            _this.val(a.join("/"));
        } else if(val.includes("/") == false && val.includes(".") == false ) {
            if(val.length == 6){
                if(parseInt(val.substr(4,2)) > 20){
                    var nam = "19" + val.substr(4,2);
                } else {
                    var nam = "20" + val.substr(4,2);
                }
            }
            if(val.length == 8){
                var nam = val.substr(4,4);
            }
            var ngay = val.substr(0,2);
            var thang = val.substr(2,2);
            if(parseInt(ngay) > 31 || parseInt(ngay) <= 0  ){
                alert('Ngày nhập sai ['+ ngay +'] nên chuyển sang 31');ngay = 31;
            }
            if(parseInt(thang) > 12 || parseInt(thang) <= 0){
                alert('Tháng nhập sai ['+ thang +'] nên chuyển sang 12');thang = 12;
            }
            _this.val(ngay+"/"+thang+"/"+nam);
        } else {
            alert('Nhập liệu sai, vui lòng nhập lại');
        }
    });
}
