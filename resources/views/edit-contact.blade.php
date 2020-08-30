@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title">Contacts</span>
                    </div>

                    <form action="{{ route('contact.updateContact', $contact->id) }}" style="margin: 20px" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="{{ $contact->fname }}" placeholder="First name"
                                class="form-control mt-3" name="fname">
                            <input type="text" value="{{ $contact->lname }}" placeholder="Last name"
                                class="form-control mt-3" name="lname">
                            <select name="company_id" class="form-control mt-3">
                                <option value="">Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ $company->id == $contact->company->id ? 'selected' : '' }}>{{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Phone number" value="{{ $contact->phone_number }}"
                                class="form-control mt-3" name="phone_number">
                            <input type="text" placeholder="E-Mail" value="{{ $contact->email }}" class="form-control mt-3"
                                name="email">
                            <input type="text" placeholder="Address" value="{{ $contact->address }}"
                                class="form-control mt-3" name="address">

                            <button type="submit" class="btn btn-success mt-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
