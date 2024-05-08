<div class="sidebar">
    <ul>
        @admin
            <li @routeactive('hotels.show')><a href="{{ route('hotels.show', $hotel)}}"><i class="fas fa-gauge"></i>
            Информация</a></li>
            <li @routeactive('services.index')><a href="{{ route('services.index')}}"><i class="fa-regular
            fa-bell-concierge"></i> Удобства и услуги</a></li>
            <li @routeactive('payments.index')>
            <a href="{{ route('payments.index')}}"><i class="fa-regular fa-money-bill"></i> Способы оплаты</a>
            </li>
{{--            <li @routeactive('policies.index')><a href="{{ route('policies.index')}}"><i class="fa-regular fa-key"></i>--}}
{{--            Политика</a></li>--}}
{{--            <li @routeactive('reviews.index')><a href="{{ route('reviews.index')}}"><i class="fa-light fa-message"></i>--}}
{{--            Отзывы</a></li>--}}
        @endadmin
        @manager
            <li @routeactive('manager.dashboard')><a href="{{ route('manager.dashboard')}}"><i class="fas
            fa-gauge"></i> Консоль</a></li>
            <li @routeactive('manager.books.index')><a href="{{ route('manager.books.index')}}"><i class="fas
            fa-calendar"></i> Бронирование</a></li>
            <li @routeactive('manager.hotels.index')><a href="{{ route('manager.hotels.index')}}"><i class="fas
            fa-hotel"></i> Отели</a></li>
            <li @routeactive('manager.rooms.index')><a href="{{ route('manager.rooms.index')}}"><i class="fas
            fa-booth-curtain"></i> Номера</a></li>
            <li @routeactive('manager.users.index')><a href="{{ route('manager.users.index')}}"><i class="fas
            fa-user"></i> Пользователи</a></li>
            <li @routeactive('manager.pages.index')><a href="{{ route('manager.pages.index')}}"><i class="fas
            fa-page"></i> Страницы</a></li>
            <li @routeactive('manager.contacts.index')><a href="{{ route('manager.contacts.index')}}"><i class="fas
            fa-address-book"></i> Контакты</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="fas
            fa-address-card"></i> Профиль</a></li>
        @endmanager
        @buh
            <li @routeactive('buh.dashboard')><a href="{{ route('buh.dashboard')}}"><i class="fas fa-gauge"></i>
            Консоль</a></li>
            <li @routeactive('buh.books.index')><a href="{{ route('buh.books.index')}}"><i class="fas
            fa-calendar"></i> Бронирование</a></li>
            <li @routeactive('buh.hotels.index')><a href="{{ route('buh.hotels.index')}}"><i class="fas
            fa-hotel"></i> Отели</a></li>
            <li @routeactive('buh.rooms.index')><a href="{{ route('buh.rooms.index')}}"><i class="fas
            fa-booth-curtain"></i> Номера</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="fas
            fa-address-card"></i> Профиль</a></li>
        @endbuh
        @hotel
            <li @routeactive('hotel.dashboard')><a href="{{ route('hotel.dashboard')}}"><i class="fas fa-gauge"></i>
            Консоль</a></li>
            <li @routeactive('hotel.books.index')><a href="{{ route('hotel.books.index')}}"><i class="fas
            fa-calendar"></i> Бронирование</a></li>
            <li @routeactive('hotel.hotels.index')><a href="{{ route('hotel.hotels.index')}}"><i class="fas
            fa-hotel"></i> Отели</a></li>
            <li @routeactive('hotel.rooms.index')><a href="{{ route('hotel.rooms.index')}}"><i class="fas
            fa-booth-curtain"></i> Номера</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="fas
            fa-address-card"></i> Профиль</a></li>
        @endhotel
    </ul>
</div>
