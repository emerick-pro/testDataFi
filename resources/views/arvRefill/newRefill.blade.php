@extends('layouts.mainLayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Nouvel approvisionnement '}}</div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($message))
                <div class="alert alert-success">
                    <ul>
                        {{$message}}
                    </ul>
                </div>
            @endif


                <form action="<?php echo url("/postNewDrugRefill");?>" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-group row">
                      <label for="patientCode" class="col-sm-5 col-form-label">Code du patient</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="patientCode" name="patient_code" placeholder="Code du patient">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="dateRefill" class="col-sm-5 col-form-label">Date d'approvisionnement</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="dateRefill" name="date_refill" placeholder="__/__/____">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="medecine" class="col-sm-5 col-form-label">Medicament</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="medecine" name="medecine_name" placeholder="Nom du medicamment">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="quantity" class="col-sm-5 col-form-label">Quantite</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" id="quantity" name="quantity" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="nbr_days" class="col-sm-5 col-form-label">Nombre de jours</label>
                        <div class="col-sm-7">
                          <input type="number" class="form-control" id="days" name="nbr_days" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="datenextRefill" class="col-sm-5 col-form-label">Date du prochain rendez vous</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="dateRefill" name="prochain_rendez_vous" placeholder="__/__/____">
                        </div>
                      </div>

                    <div class="form-group row">
                      <div class="col-sm-7">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                    </div>
                  </form>
</div>

</div>
</div>

</div>
@endsection
