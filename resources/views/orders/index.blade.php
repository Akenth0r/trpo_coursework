@extends('layouts.app')

@section('content')
    <div class="container shadow p-4 rounded">
        <h2>{{$user->priviledge == 1 ? "Заказы" : "Мои заказы"}}</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Пользователь</th>
                <th>Номер телефона</th>
                <th>Число билетов</th>
                <th>Адрес</th>
                <th>Дата проведения</th>
            </tr>
            </thead>
            @foreach ($orders as $order)
                <tr>
                    <!-- Пользователь -->
                    <td>
                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">{{ "{$order->user->lastname} {$order->user->firstname}" }}</a>
                        @if ($user->priviledge == 1)
                            <a href="{{route('orders.edit', ['order' => $order])}}" class="mx-1"><span class="fas fa-edit text-dark"></span></a>
                            <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$order->id}}').submit()">
                                <span class="fas fa-trash text-dark"></span>
                            </a>
                            <form action="{{route('orders.destroy', compact('order'))}}" method="post" id="delete-form-{{$order->id}}" class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        @endif
                    </td>
                    <!-- Номер телефона -->
                    <td>
                        {{$order->user->phone}}
                    </td>
                    <!-- Число билетов -->
                    <td>
                        {{$order->tickets->count()}}
                    </td>
                    <!-- Адрес -->
                    <td>
                        {{$order->event->place}}
                    </td>
                    <!-- Дата проведения -->
                    <td>
                        {{$order->event->place}}
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="row">
            <div class="col-12">
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
