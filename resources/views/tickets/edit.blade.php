@extends('layouts.app')
@section('content')
    <div class="container card">
        <form action="{{route('tickets.update', ["ticket" => $ticket])}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="row card-header">
                <h3>Create new post</h3>
            </div>

            <div class="card-body">
                <!-- row -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="row">Ряд</label>
                        <input type="number"
                               id="row"
                               class="form-control @error('row') is-invalid @enderror"
                               name="row"
                               value="{{$ticket->row}}"
                               autofocus>
                        @error('row')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                <!-- placeNum -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="placeNum">Номер</label>
                        <input type="number"
                               id="placeNum"
                               class="form-control @error('placeNum') is-invalid @enderror"
                               name="placeNum"
                               value="{{$ticket->placeNum}}"
                               autofocus>
                        @error('placeNum')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <!-- status -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="status">Статус</label>
                        <select name="status" id="status" class="form-control" >
                            <option value="есть в наличии" @if ($ticket->status == "есть в наличии") selected @endif>есть в наличии</option>
                            <option value="забронирован" @if ($ticket->status == "забронирован") selected @endif>забронирован</option>
                            <option value="продан" @if ($ticket->status == "продан") selected @endif>продан</option>
                            <option value="передан для реализации" @if ($ticket->status == "передан для реализации") selected @endif>передан для реализации</option>
                        </select>
                    </div>
                </div>

                <!-- place type -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label class="form-check-label" for="placeType">Тип места</label>
                        <select name="placeType" id="placeType" class="form-control" >
                            <option value="партер"   @if ($ticket->placeType == "партер")   selected @endif>партер</option>
                            <option value="балкон"   @if ($ticket->placeType == "балкон")   selected @endif>балкон</option>
                            <option value="ложа"     @if ($ticket->placeType == "ложа")     selected @endif>ложа</option>
                            <option value="бельэтаж" @if ($ticket->placeType == "бельэтаж") selected @endif>бельэтаж</option>
                            <option value="vip"      @if ($ticket->placeType == "vip")      selected @endif>VIP</option>
                        </select>
                    </div>
                </div>

                <!-- cost -->
                <div class="form-group row">
                    <div class="col-md-6 p-0">
                        <label for="cost">Стоимость</label>
                        <input type="text"
                               id="cost"
                               class="form-control @error('cost') is-invalid @enderror"
                               name="cost"
                               value="{{$ticket->cost}}"
                               autofocus>
                        @error('cost')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <input name="event_id" type="hidden" value="{{$ticket->event_id}}">
                <input name="order_id" type="hidden" value="{{$ticket->order_id}}">

                <!-- Submit -->
                <div class="row pt-2">
                    <button class="btn btn-primary" type="submit" >Изменить билет</button>
                </div>
            </div>
        </form>
    </div>
@endsection
