@extends('auth.layouts.hotelhead')

@section('title', 'Отели')

@section('content')

    <div class="page admin mainhotels">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        <input type="search" value="{{ $s_query ?? '' }}" placeholder="Search...">
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="add">
                        <a href="{{ route('hotels.create') }}" class="more"><i class="fa-regular fa-plus"></i>
                            Add</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        @foreach($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->title }}</td>
                            <td>{{ $hotel->address }}</td>
                            <td>
                                <a href="{{ route('hotels.show', $hotel) }}" class="more"><i class="fa-regular
                                fa-pen-to-square"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $hotels->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        function submit_post_filter() {
            let appUrl = {!! json_encode(url('/admin/')) !!};
            let s_query = $('#s_query').val();
            let show_item_at_once = $('#show_item_at_once').val();
            let ch_status = $('#ch_status').val();
            console.log(show_item_at_once);

            if (s_query != '') {
                s_query = s_query;
            } else {
                s_query = '0';
            }

            if (show_item_at_once != '0') {
                show_item_at_once = show_item_at_once;
            } else if (show_item_at_once == '0') {
                show_item_at_once = 0;
            } else {
                show_item_at_once = 'all';
            }

            if (ch_status != '') {
                ch_status = ch_status;
            } else {
                ch_status = '3';
            }


            window.location.href = appUrl + '/hotels/' + ch_status + '/' + show_item_at_once + '/' +
                s_query;
        }

        $(document).ready(function () {
            $('#filter_btn').click(function () {
                submit_post_filter();
            });

        });
    </script>

@endsection
