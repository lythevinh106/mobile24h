@extends('client.layouts.main')


@section('content')
    <div class="check_order-wrapper">
        <div class="check_order container">



            <h3 class="check_order__title">
                Kiểm Tra Đơn Hàng của bạn
            </h3>

            <div class="check_order__input">

                <input type="text" id="input_order_token" name="order_token" placeholder="Vui Lòng Nhập Mã Vận Đơn Của Bạn">
            </div>

            <div class="check_order__btn ">
                <button id="check_order__btn-submit">

                    Tra Cứu
                </button>
            </div>

        </div>

    </div>
    <div class="content-info-order container" id="result_order_wrapper">


    </div>
@endsection

@section('js')
    <script>
        $("#check_order__btn-submit").click(function() {




            let order_token = $(this).parents(".check_order").find("#input_order_token").val();

            $.ajax({
                type: "post",
                url: "/order/store_check",
                data: {
                    order_token: order_token
                },
                dataType: "json",
                success: function(response) {

                    if (response.error == false) {
                        // alert(response.html);
                        $("#result_order_wrapper").html(response.html);


                    }

                    if (response.error == true) {
                        $("#result_order_wrapper").html(
                            '<h3 style="text-align:center">Mã Vận Đơn Không Đúng Vui Lòng Kiểm Tra Lại<h3>'
                        );

                    }

                }
            });
        })
    </script>
@endsection
