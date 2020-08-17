@extends('layouts.app')

@section('content')
<div class="container">
    @isset($timeline)
    <div class="row justify-content-center">
        <div class="col-md-10">
            {{ Form::open(['route' => 'update-timeline']) }}
            {{ Form::hidden('id', $timeline->id) }}
            <div class="form-group row">
                {{ Form::label('Description', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                <div class="col-md-6">
                    {{ Form::text('Description', $timeline->Description, ['class' => 'form-control '.($errors->has('Description') ? 'is-invalid' : ''), 'readonly' => '']) }}
                    @error('Description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('DateTime', 'Date & Time', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                <div class="col-md-6">
                    {{ Form::text('DateTime', is_null(old('DateTime')) ? $timeline->DateTime : old('DateTime')
                    , ['class' => 'form-control '.($errors->has('DateTime') ? 'is-invalid' : '')]) }}
                    @error('DateTime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                    <a class="btn btn-danger" href="/timeline" type="button">Cancel</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    @endisset
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-primary mb-2" href="/timeline/reset">Reset</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Description</th>
                        <th>DateTime</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timelines as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->Description }}</td>
                            <td>{{ $item->DateTime }}</td>
                            <td><a href="/timeline/{{ $item->id }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            <a href="/download?file={{ Crypt::encrypt('SKL') }}">Download</a>
        </div>
    </div>
</div>
@endsection