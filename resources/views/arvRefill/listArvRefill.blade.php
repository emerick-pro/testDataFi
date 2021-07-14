@extends('layouts.mainLayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Liste des approvisionnements '}}</div>

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


                <form action="<?php echo url("/filterRefillByDates");?>" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group row">
                      <label for="dateRefill" class="col-sm-3 col-form-label">Date du </label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="dateRefill" name="date_refill1" placeholder="__/__/____">
                      </div>

                        <label for="datenextRefill" class="col-sm-1 col-form-label">Au </label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="dateRefill" name="date_refill2" placeholder="__/__/____">
                        </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                      </div>
                    </div>
                  </form>
</div>

</div>
<div class="alert alert-success">
    <ul>
        Nombre total des patients dans le systeme : <strong>{{$nbr_patients}}</strong>
    </ul>
</div>
</div>

<div class="row">

    <table class="table">
        <thead>
            <tr>
                <th>Code du Patient</th>
                <th>Date d'approvisionnement</th>
                <th>Quantite </th>
                <th>Date de Prochain rendez-vous</th>
            </tr>
        </thead>
        <tbody>

           <?php
           if(isset($refills)){


            foreach($refills as $refill){
                ?>
            <tr>
                <td scope="row"><?php echo $refill->patient_code;?></td>
                <td scope="row"><?php echo $refill->date_refill;?></td>
                <td scope="row"><?php echo $refill->quantity;?></td>
                <td scope="row"><?php echo $refill->prochain_rendez_vous;?></td>

            </tr>
            <?php
            }

        }
            ?>
        </tbody>
    </table>
   </div>


</div>
@endsection
