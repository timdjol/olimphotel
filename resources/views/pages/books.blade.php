@extends('layouts.booking')

@section('title', 'Бронирование')

@section('content')

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12">
                <div id='calendar'></div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="show_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>@lang('main.booking')</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">@lang('main.close')</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form>
                                    <input type="hidden" class="form-control" name="room_id" id="room_id"
                                           value="{{ $id }}"/>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="title">@lang('main.name')</label>
                                        <input type="text" class="form-control" name="title" id="title" required />
                                        <span id="titleError" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-4" for="phone">@lang('main.phone')</label>
                                        <input type="number" class="form-control" name="phone" id="phone" required>
                                        <div id="output"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="content">@lang('main.message')</label>
                                        <input type="text" class="form-control" name="comment" id="comment" />
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-4" for="count">@lang('main.count_per')</label>
                                        <select name="count" id="count" required>
                                            <option>@lang('main.choose')</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-4" for="start_d">@lang('main.start_d')</label>
                                        <input type="text" name="start_d" readonly id="start_d" />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-4" for="end_d">@lang('main.end_d')</label>
                                        <input type="text" name="end_d" readonly id="end_d" />
                                    </div>
                                    <button class="more" id="saveBtn">@lang('main.order')</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>

<style>
    .fc-title{
        color: transparent;
    }
    .fc-title .busy{
        color: #fff;
    }
</style>

@endsection

