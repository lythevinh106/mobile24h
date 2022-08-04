<ul class="search_ajax_list">

    @foreach ($products as $product)
        <li onclick="attach_value(this)" class="search_ajax_list_li">
            <div class="search_ajax_list_li--name">{{ $product->name }}</div>
            <div class="search_ajax_list_li--img">
                <img src="{{ $product->feature_image }}" alt="">
            </div>
        </li>
    @endforeach


</ul>
