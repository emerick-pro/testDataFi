<?php

namespace App\Http\Controllers;

use App\Models\ArvRefill;
use App\Models\Patient;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ArvRefillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $refills=ArvRefill::all();

        $nbr_patients=Patient::count();

        return view('arvRefill.listArvRefill')
        ->with('refills', $refills)
        ->with('nbr_patients', $nbr_patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator=$request->validate([

            'patient_code'=>'required',

            'date_refill'=>'required|date_format:"d/m/Y"|before:tomorrow',
            'prochain_rendez_vous'=>'sometimes|date_format:"d/m/Y"',
        ]);
        $refill=array();
        $refill['patient_code']=$request->input('patient_code');
        $refill['date_refill']=mysqldate($request->input('date_refill'));
        $refill['quantity']=$request->input('quantity');
        $refill['prochain_rendez_vous']=mysqldate($request->input('prochain_rendez_vous'));
        $refill['nbr_days']=$request->input('nbr_days');

        $this->procedeRefillValidation($refill);

        DB::beginTransaction();

        $appro= ArvRefill::create( $refill);

        DB::commit();
        //
        return view('arvRefill.newRefill',["message"=>"Enregistrement avec success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArvRefill  $arvRefill
     * @return \Illuminate\Http\Response
     */
    public function show(ArvRefill $arvRefill)
    {
        //
    }

    public function filterRefillsByDates(Request $request)
    {
        $validator=$request->validate([



            'date_refill1'=>'required|date_format:"d/m/Y"|before:tomorrow',
            'date_refill2'=>'required|date_format:"d/m/Y"|after:date_refill1',
        ]);

        $date_refill1=mysqldate($request->input('date_refill1'));
        $date_refill2=mysqldate($request->input('date_refill2'));

        /* Get refills between a period of two dates */
        $refills=ArvRefill::where('date_refill','>=',$date_refill1)
                        ->where('date_refill','<=',$date_refill2)->get();

        $nbr_patients=Patient::count();

        return view('arvRefill.listArvRefill')
        ->with('refills', $refills)
        ->with('nbr_patients', $nbr_patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArvRefill  $arvRefill
     * @return \Illuminate\Http\Response
     */
    public function edit(ArvRefill $arvRefill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArvRefill  $arvRefill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArvRefill $arvRefill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArvRefill  $arvRefill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArvRefill $arvRefill)
    {
        //
    }

    /**
     * Return boolean
     * Make sure the dates are coherent
     *
     */

    private function procedeRefillValidation($refill)
    {
        return true;
    }
}
