@extends('layout.app')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                @if (session()->has('message'))
                    <div class="alert alert-success mr-2 ml-2 mt-2" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title">Contacts</span>
                        <ul class="pull-right c-controls">
                            <li><a href="#addContact" data-toggle="tooltip" data-placement="top" title="Add Contact"><i
                                        class="glyphicon glyphicon-plus"></i></a></li>
                            <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip"
                                    data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-xs-12">
                            <div class="input-group c-search">
                                <input type="text" class="form-control" id="contact-list-search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span
                                            class="glyphicon glyphicon-search text-muted"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group" id="contact-list">

                        @foreach ($contacts as $contact)

                            <li class="list-group-item" data-name="{{ $contact->fname }}">
                                <div class="col-xs-12 col-sm-2">
                                    <img src="/img/no-image.png" alt="No Image" class="img-responsive img-circle" />
                                    <form action="{{ route('contact.deleteContact', $contact->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger delete">Delete</button>
                                    </form>

                                </div>
                                <div class="col-xs-12 col-sm-10">
                                    <a href="{{ route('contact.editContact', $contact->id) }}" class="edit">Edit</a>
                                    <span class="name">{{ $contact->fname . ' ' . $contact->lname }} |
                                        {{ $contact->company->name ?? '' }}</span><br />
                                    @if ($contact->addres)
                                        <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip"
                                            title="{{ $contact->address }}"></span>
                                        {{ $contact->address }}
                                    @endif
                                    @if ($contact->phone_number)
                                        <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip"
                                            title="{{ $contact->phone_number }}"></span>
                                        {{ $contact->phone_number }}
                                    @endif

                                    @if ($contact->email)
                                        <span class="fa fa-comments text-muted c-info" data-toggle="tooltip"
                                            title="{{ $contact->email }}"></span>
                                        {{ $contact->email }}
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        @include('modal.add')

        <!-- JavaScrip Search Plugin -->
        <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
        <script src="/js/mine.js"></script>
    </div>

@endsection
