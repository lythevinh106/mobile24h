$(".select2_init").select2({

    theme : "classic"
});

function tinyMce($select) {
    var editor_config = {
        path_absolute: "http://127.0.0.1:8000/",
        selector: $select,
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern",
        ],
        toolbar:
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function (callback, value, meta) {
            var x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.getElementsByTagName("body")[0].clientWidth;
            var y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.getElementsByTagName("body")[0].clientHeight;

            var cmsURL =
                editor_config.path_absolute +
                "laravel-filemanager?editor=" +
                meta.fieldname;
            if (meta.filetype == "image") {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: "Filemanager",
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                },
            });
        },
    };

    tinymce.init(editor_config);
}

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function uploadthumb(selector, link) {
    $(selector).change(function () {
        var form = new FormData(); ///tao ra 1 cai form giong nhu thay the viec submit
        form.append("file", $(this)[0].files[0]); // append: la them vao 1 cai inpt cua fomr ay co type la file, $(this)[0].files[0] la du lieu cua form ay
        // console.log($(this)[0].files[0]);

        $.ajax({
            processData: false,
            contentType: false,

            type: "POST",
            url: link,
            data: form,

            dataType: "JSON",
            success: function (response) {
                if (response.error == false) {
                    $("#image_show").html(
                        '<a href="' +
                            response.url +
                            '" target="_blank"> <img src ="' +
                            response.url +
                            '" width="300px" ></a>'
                    );

                    $("#upload_thumb").val(response.url);
                } else {
                    alert(
                        "upload thất bại: vui lòng upload file ảnh dưới 100mb và file ảnh thuộc kiểu: png,jpg,jpeg"
                    );
                }
            },
            error: function (errros) {
                // alert(
                //     messag
                // );
                alert(errros.responseJSON.message);
            },
        });
    });
}

function multi_uploadthumb(selector, link, name_file_send) {
    $(selector).change(function () {
        var form = new FormData();

        for (let i = 0; i < $(this)[0].files.length; i++) {
            form.append(name_file_send, $(this)[0].files[i]);
            //  console.log($(this)[0].files[i]);
        }

        // console.log(form.get("file2"));

        $.ajax({
            processData: false,
            contentType: false,

            type: "POST",
            url: link,
            data: form,

            dataType: "JSON",
            success: function (response) {
                if (response.error == false) {
                    // console.log(response.url);

                    // $("#image_show").append('<a href="' + response.url +
                    //     '" target="_blank"> <img src ="' + response.url +
                    //     '" width="300px" ></a>')
                    $lenght_url = response.url.length;
                    $("#image_multi_show").html("");
                    for (let i = 0; i < $lenght_url; i++) {
                        $("#image_multi_show").append(
                            '<a  class="mt-4" href="' +
                                response.url[i] +
                                '" target="_blank"> <img src ="' +
                                response.url[i] +
                                '" width="200px" ></a>'
                        );

                        $("#image_multi_show").append(
                            ' <input hidden type="hidden" id="multiupload_thumb" value="' +
                                response.url[i] +
                                '" name="small_image[]">'
                        );
                    }
                } else {
                    alert("upload thất bại");
                }
            },

            error: function (errros) {
                alert(errros.responseJSON.message);
            },
        });
    });
}

function removeRow(id, url) {
    $confirm = confirm("Xóa mà không thể khôi phục. Bạn có chắc ?");

    if ($confirm) {
        // console.log(id)
        $.ajax({
            type: "DELETE",
            url: url,
            data: {
                id: id,
            },
            dataType: "JSON",
            success: function (response) {
                if (response.error === false) {
                    alert(response.message);

                    // location.reload();
                    let string = "#row-" + id;
                    $(string).remove();
                    //console.log(typeof response.list_children_deleted);
                    if (response.list_children_deleted.length > 0) {
                        for (let children of response.list_children_deleted) {
                            let string2 = "#row-" + children;
                            $(string2).remove();
                        }
                    }
                } else {
                    alert("Xóa lỗi vui lòng thử lại");
                }
            },
        });
    }
}
