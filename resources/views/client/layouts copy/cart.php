<div class="content-cart container">

    <!-- modal-box-clear-all -->

    <div class="modal-box modal-box__cart-clear-all">



        <h3>Chú Ý</h3>
        <p class="modal-box__title">Bạn có muốn xóa tất cả sản phẩm ra khỏi giỏ hàng không?</p>
        <div class="modal-box__btn">
            <button class="btn btn-no">Hủy Bỏ</button>
            <button class="btn btn-yes">Đồng Ý</button>
        </div>


    </div>


    <!-- modal-box-clear-item -->
    <div class="modal-box modal-box__cart-clear-item">



        <h3>Chú Ý</h3>
        <p class="modal-box__title">Bạn có muốn xóa sản phẩm ra khỏi giỏ hàng không?</p>
        <div class="modal-box__btn">
            <button class="btn btn-no">Hủy Bỏ</button>
            <button class="btn btn-yes">Đồng Ý</button>
        </div>


    </div>



    <div class="content-cart-detail">
        <div class="content-cart-detail-top">
            <div class="content-cart-detail-top__title">
                Giỏ Hàng
            </div>

            <div class="btn content-cart-detail-top__clear-all">Xóa Tất Cả</div>
        </div>

        <div class="content-cart-detail-main">
            <table>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox">
                        </th>
                        <th>
                            Hình Ảnh
                        </th>
                        <th>
                            Thông Tin
                        </th>

                        <th>
                            Đơn Giá
                        </th>
                        <th>Số Lượng</th>

                        <th>Thành Tiền</th>
                        <th>Hành Động</th>
                    </tr>


                </thead>

                <tbody>
                    <tr>
                        <td class="content-cart-detail-main__check"><input type="checkbox"></td>
                        <td class="content-cart-detail-main__img">
                            <img src="images/show-pd1.jpg" alt="">
                        </td>

                        <td class="content-cart-detail-main__info">

                            Màn hình LCD SAMSUNG LS19A330NHEXXV (1366 x 768/TN/60Hz/5 ms)

                        </td>

                        <td class="content-cart-detail-main__price">

                            2.790.000 đ

                        </td>


                        <td class="content-cart-detail-main__number">



                            <input type="number" min="0" max="5" value=1>


                        </td>
                        <td class="content-cart-detail-main__total-price">
                            2.625.365Đ
                        </td>
                        <td class="content-cart-detail-main__clear"><a>Xóa</a></td>
                    </tr>


                    <tr>
                        <td><input type="checkbox"></td>
                        <td class="content-cart-detail-main__img">
                            <img src="images/dm-thietbi.png" alt="">
                        </td>

                        <td class="content-cart-detail-main__info">

                            Màn hình LCD SAMSUNG LS19A330NHEXXV (1366 x 768/TN/60Hz/5 ms)

                        </td>

                        <td class="content-cart-detail-main__price">

                            2.790.000 đ

                        </td>


                        <td class="content-cart-detail-main__number">



                            <input type="number" min="1" max="5" value=1>


                        </td>
                        <td class="content-cart-detail-main__total-price">
                            2.625.365Đ
                        </td>
                        <td class="content-cart-detail-main__clear"><a>Xóa</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-cart-pay">

        <div class="content-cart-pay__title">
            Thanh toán
        </div>

        <div class="content-cart-pay-main">
            <form action="">
                <div class="content-cart-pay-main__total">
                    <span>Tổng Tiền:</span>
                    <span class="content-cart-pay-main__total__price">300.000.000 Đ</span>
                </div>

                <div class="content-cart-pay-main__payment-method">
                    <span>Phương Thức Thanh Toán:</span>

                    <div class="payment-method-wrapper">

                        <div class="payment-method"> <input name="payment-method" type="radio" value="cod" /> <span>COD</span></div>
                        <!-- <div class="payment-method"> <input name="payment-method" type="radio" value="bank" /> <span>Thanh Toán Qua Ngân Hàng</span></di>

                        </div> -->

                    </div>
                </div>


                <div class="content-cart-pay-order">
                    <div class="content-cart-pay-order__title">
                        Thông tin đặt hàng
                    </div>
                    <div class="content-cart-pay-order__warring">
                        Bạn cần nhập đầy đủ các trường thông tin có dấu *
                    </div>
                    <input class="content-cart-pay-order__name" type="text" placeholder="Họ Và Tên *">
                    <input class="content-cart-pay-order__phone" type="text" placeholder="Số Điện Thoại *">
                    <select class="content-cart-pay-order__city">
                        <option>Tỉnh Thành Phố *</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>

                    </select>


                    <select class="content-cart-pay-order__district">
                        <option>Quận Huyện*</option>
                        <option>Quận 1</option>
                        <option>Quận 2</option>


                    </select>

                    <input class="content-cart-pay-order__email" type="text" placeholder="Email">
                    <textarea rows="9" class="content-cart-pay-order__note" placeholder="Ghi Chú">Ghi Chú..</textarea>
                </div>











                <input class="content-cart-pay-submit" type="submit" value="Tiến Hành Thanh Toán">





                <!-- /////order is login -->

                <div class="content-cart-pay-order">
                    <div class="content-cart-pay-order__title">
                        Thông tin đặt hàng
                    </div>
                    <div class="content-cart-pay-order__warring">
                        Vui lòng xem lại thông tin nhận hàng của bạn nếu muốn chỉnh sửa hay <a href="">nhấn vào đây</a>

                    </div>
                    <input readonly class="content-cart-pay-order__name" type="text" placeholder="Họ Và Tên *">
                    <input readonly class="content-cart-pay-order__phone" type="text" placeholder="Số Điện Thoại *">
                    <select readonly class="content-cart-pay-order__city">
                        <option>Tỉnh Thành Phố *</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>
                        <option>Hà Nội</option>
                        <option>Hồ Chí Minh</option>

                    </select>


                    <select readonly class="content-cart-pay-order__district">
                        <option>Quận Huyện*</option>
                        <option>Quận 1</option>
                        <option>Quận 2</option>


                    </select>

                    <input readonly class="content-cart-pay-order__email" type="text" placeholder="Email">
                    <textarea rows="9" class="content-cart-pay-order__note" placeholder="Ghi Chú">Ghi Chú..</textarea>


                </div>
                <input class="content-cart-pay-submit" type="submit" value="Tiến Hành Thanh Toán">




                <!-- ///end order is login -->
            </form>
        </div>
    </div>