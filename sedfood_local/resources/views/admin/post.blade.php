@extends('admin.layout.layoutAdmin')
@Section('title', 'Admin | Danh mục')
@Section('content')


    <h3 class="title-page ">
        Bài viết
    </h3>
    <form action="/search" method="GET">
        <input class="inputSearch_Admin" name="search" placeholder="Nhập từ khóa tìm kiếm" type="search">
        <button type="submit" class="btn-coupon">Tìm kiếm</button>
    </form>

    <button class="btnFormAdd mb-3">
        <a href="{{ route('postAdd') }}" class="text-decoration-none ">Thêm</a>
    </button>

    <table class="">
        <thead>
            <tr class="">
                <th class=" py-2">Hình ảnh</th>
                <th class=" py-2">Tiêu đề</th>
                <th class=" py-2">Ngày đăng</th>
                <th class=" py-2">Trạng thái</th>
                <th class=" py-2">Hành động</th>
            </tr>
        </thead>

        <tbody class="">
            @foreach ($posts as $item)
                <tr class="table-row">
                    <td class="table-data"><img src="{{ asset('storage/uploads/' . $item->image) }}" alt=""></td>
                    <td class="table-data">{{ $item->name }}</td>
                    <td class="table-data">{{ $item->date }}</td>
                    <td class="table-data">
                        @if ($item->status == 0)
                            <img src="https://img.icons8.com/material-rounded/24/FA5252/toggle-off.png" alt="toggle-off"
                                style="width:25px;height:25px; object-fit:cover;" />
                        @else
                            <div class="">
                                <img src="https://img.icons8.com/ios-filled/50/40C057/toggle-on.png" alt="toggle-on"
                                    style="width:25px;height:25px; object-fit:cover;" />
                            </div>
                        @endif
                    </td>
                    <td class="actionAdmin">
                        <a href="{{ route('postEdit', $item['id']) }}" class="text-decoration-none px-2"><img
                                src="https://img.icons8.com/sf-black-filled/64/1f508d/create-new.png" alt="create-new"
                                style="width:35px;height:35px; object-fit:cover;" /></a>
                        <a href="{{ route('postDelete', $item['id']) }}" class="text-decoration-none "><i
                                class="fa-solid fa-trash" style="color: #ff0505; font-size: 25px;  "></i></a>
                    </td>
                </tr>
            @endforeach

            {{ $posts->links() }}
    </table>



@endsection
