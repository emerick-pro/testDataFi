@extends('layouts.mainLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="card">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre des patients : xxx</li>
                            <li class="list-group-item">Total des approvisionnements : xxxx </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
