@extends('layouts.master')

@section('content')
    <section class="content-header">
        @if ($editMode)
            {!! Form::model($client, ['route' => ['clients.update', $client->id]]) !!}
        @else
            {!! Form::open(['route' => 'clients.store']) !!}
        @endif
        <h3 class="float-left">@lang('fi.client_form')</h3>

        <div class="float-right">
            @if ($editMode)
                <a href="{{ $returnUrl }}" class="btn btn-secondary"><i class="fa fa-backward"></i> @lang('fi.back')
                </a>
            @endif
            <button class="btn btn-primary"><i class="fa fa-save"></i> @lang('fi.save')</button>
        </div>
        <div class="clearfix"></div>
    </section>

    <section class="content">

        @include('layouts._alerts')
        <div class="row">
            <div class="col-12">
                <div class="card m-2">

                    <div class="card-header d-flex p-0">

                        {{--<div class="nav-tabs-custom">--}}
                        <ul class="nav nav-tabs p-2">
                            <li class="nav-item"><a class="nav-link active show" href="#tab-general"
                                                     data-toggle="tab">@lang('fi.general')</a></li>
                            @if ($editMode)
                                <li class="nav-item"><a class="nav-link" href="#tab-contacts"
                                                        data-toggle="tab">@lang('fi.contacts')</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-attachments"
                                                        data-toggle="tab">@lang('fi.attachments')</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab-notes"
                                                        data-toggle="tab">@lang('fi.notes')</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-general">
                                @include('clients._form')
                            </div>
                            @if ($editMode)
                                <div class="tab-pane" id="tab-contacts">
                                    @include('clients._contacts', ['contacts' => $client->contacts()->orderBy('name')->get(), 'clientId' => $client->id])
                                </div>
                                <div class="tab-pane" id="tab-attachments">
                                    @include('attachments._table', ['object' => $client, 'model' => 'FI\Modules\Clients\Models\Client'])
                                </div>
                                <div class="tab-pane" id="tab-notes">
                                    @include('notes._notes', ['object' => $client, 'model' => 'FI\Modules\Clients\Models\Client', 'hideHeader' => true])
                                </div>
                            @endif
                        </div>
                    </div>
                    {{--</div>--}}

                </div>
            </div>

        </div>

    </section>

    {!! Form::close() !!}

@stop