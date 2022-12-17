<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activitiesList = ['Dato1', 'Dato2', 'Dato3', 'Dato4', 'Dato5', 'Dato6', 'Dato7', 'Dato8', 'Dato9', 'Dato10'];
        return view('modules.offers.offers_create', compact('activitiesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $dataNewOffer = request()->except('_token');
        $currentDate = date("Y-m-d H:i:s");

        $dataNewOffer['creator'] = 'Usuario';
        $dataNewOffer['status'] = 1;
        $dataNewOffer['created_at'] = $currentDate;
        $dataNewOffer['updated_at'] = $currentDate;

        $result = Offer::insert($dataNewOffer);

        $responseCreate['status'] = "success";
        $responseCreate['code'] = 200;
        $responseCreate['message'] = "Succesful transaction";

        if (!$result) {
            $responseCreate['status'] = "error";
            $responseCreate['code'] = 500;
            $responseCreate['message'] = "Unsuccessful transaction";
        }

        return redirect()->route("offers.show")->with($responseCreate['status'], response()->json($responseCreate)->content());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $data_offers = Offer::all();
        return view('modules.offers.offers_search', compact('data_offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
