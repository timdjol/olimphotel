<table>
    <tr>
        <td>@lang('main.travel')</td>
        <td>{{ $user->travel }}</td>
    </tr>
    <tr>
        <td>@lang('main.what_kind')</td>
        <td>{{ $user->choose }}</td>
    </tr>
    <tr>
        <td>@lang('main.date')</td>
        <td>{{ $user->dates }}</td>
    </tr>
    <tr>
        <td>@lang('main.count')</td>
        <td>{{ $user->count }}</td>
    </tr>
    <tr>
        <td>@lang('main.name')</td>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <td>@lang('main.phone')</td>
        <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
    </tr>
</table>

<style>
    table{
        width: 100%;
    }
    table td{
        padding: 10px;
        border-top: 1px solid #ddd;
    }
</style>