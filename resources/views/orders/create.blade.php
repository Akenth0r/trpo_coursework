@extends('layouts.app')
@section('content')
    <div class="container card">
        <form action="{{route('orders.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row card-header">
                <h3>Сделать новый заказ</h3>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="addr">Адрес доставки: </label>
                        <input type="text"
                               id="addr"
                               class="form-control @error('addr') is-invalid @enderror"
                               name="addr"
                               value="{{old('addr')}}"
                               autofocus required>
                        @error('addr')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="far">Дальность доставки</label>
                        <select name="far" id="far" class="form-control" >
                            <option value="центр" selected>центр</option>
                            <option value="спальный район">спальный район</option>
                            <option value="дальний пригород">дальний пригород</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="delivery_status">Дальность доставки</label>
                        <select name="delivery_status" id="delivery_status" class="form-control" >
                            <option value="доставка" selected>доставка</option>
                            <option value="оплатить в офисе">оплатить в офисе</option>
                        </select>
                    </div>
                </div>

                <!-- Выбор билетов -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="tickets">Выбор билетов (зажмите ctrl и выберите несколько элементов)</label>
                        <select name="tickets[]" id="tickets" class="form-control" multiple required>
                            @foreach ($event->tickets()->where('status', '=', 'есть в наличии')->get() as $ticket)
                            <option value="{{$ticket->id}}">{{"Ряд: {$ticket->row} / Номер: {$ticket->placeNum} / Тип: {$ticket->tickets} / Цена: {$ticket->cost} руб."}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input name="user_id" type="hidden" value="{{$user->id}}">
                <input name="event_id" type="hidden" value="{{$event->id}}">
                <input name="status" type="hidden" value="{{"новая"}}">

                <!-- Submit -->
                <div class="row pt-2">
                    <button class="btn btn-primary" type="submit" >Сделать заказ</button>
                </div>
            </div>
        </form>
    </div>
@endsection
