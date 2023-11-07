<div class="sidebar">
    <ul>
        @admin
            <li @routeactive('dashboard')><a href="{{ route('dashboard')}}">Консоль</a></li>
            <li @routeactive('home')><a href="{{ route('home')}}">Главная</a></li>
            <li @routeactive('pages.index')><a href="{{ route('pages.index')}}">Страницы</a></li>
            <li @routeactive('bookings.index')><a href="{{ route('bookings.index')}}">Бронирование</a></li>
            <li @routeactive('rooms.index')><a href="{{ route('rooms.index')}}">Номера</a></li>
            <li @routeactive('travel.index')><a href="{{ route('travel.index')}}">Экскурсии</a></li>
            <li @routeactive('orders.index')><a href="{{ route('orders.index')}}">Заявки с Экскурсии</a></li>
            <li @routeactive('rents.index')><a href="{{ route('rents.index')}}">Виды туров</a></li>
            <li @routeactive('contacts.index')><a href="{{ route('contacts.index')}}">Контакты</a></li>
            <li @routeactive('profile.edit')><a href="{{ route('profile.edit') }}">Профиль</a></li>
        @else
            <li @routeactive('person.orders.index')><a href="{{ route('person.orders.index')}}">Заказы</a></li>
            <li><a href="{{ route('profile.edit') }}">Профиль</a></li>
        @endadmin
    </ul>
</div>
