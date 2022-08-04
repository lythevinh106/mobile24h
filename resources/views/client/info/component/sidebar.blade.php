<ul class="content-info-sidebar">
    <li class="content-info-sidebar__info">
        <div class="sidebar__info__img">
            <i class="fa-solid fa-user-astronaut"></i>
        </div>
        <div class="sidebar__info-main">
            <div class="sidebar__info-main__title">
                Tài Khoản Của
            </div>
            <div class="sidebar__info-main__name">
                {{ Auth::user()->name }}
            </div>
        </div>



    </li>

    <li class="content-info-sidebar__account">
        <i class="fa-solid fa-user-astronaut"></i><a href="{{ route('info.show') }}">Thông Tin Tài
            Khoản</a>
    </li>

    <li class="content-info-sidebar__order">
        <i class="fa-solid fa-calendar-minus"></i> <a href="{{ route('info.order_show') }}">Quản Lí Đơn Hàng</a>
    </li>
    <li class="content-info-sidebar__order">
        <i class="fa-solid fa-right-from-bracket"></i> <a href="{{ route('client.logout') }}">Đăng Xuất</a>
    </li>
</ul>
