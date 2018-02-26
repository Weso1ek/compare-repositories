@extends('layout.mainlayout')
 
@section('content')
    <div class="text-muted">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Porównaj repozytoria z Github</h1>
                </div>
            </div>
            {{ Form::open(array('url' => 'compare')) }}
                <div class="row form-group">
                    <div class="col-lg-6">
                        {{ Form::label('first_repository', 'Repozytorium 1', array('class' => 'awesome')) }}
                        {{ Form::text('first_repository', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::label('second_repository', 'Repozytorium 2', array('class' => 'awesome')) }}
                        {{ Form::text('second_repository', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{ Form::submit('Porównaj', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection