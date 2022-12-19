<?php

namespace App\Http\Controllers;

use App\Exports\OffersExport;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Classes\Search\Offers\OffersSearch;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $activitiesList = Product::all();
        $currentDate = date("Y-m-d");
        return view('modules.offers.offers_create', compact('activitiesList', 'currentDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $dataNewOffer = request()->except('_token');
        $currentDate = date("Y-m-d H:i:s");

        $dataNewOffer['creator'] = 'Usuario';
        $dataNewOffer['status_id'] = 1;
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
     * @param Offer $offer
     * @return Application|Factory|View
     */
    public function show(Offer $offer)
    {
        $dataOffers = Offer::select(
            "offer_id",
            "creator",
            "object",
            "activity_id",
            "description",
            "currency",
            "budget",
            "start_date",
            "end_date",
            "status_id")->get()->map(function ($item) {
            $item->start_date = Carbon::parse($item->start_date)->format("Y-m-d");
            $item->end_date = Carbon::parse($item->end_date)->format("Y-m-d");
            return $item;
        });
        $totalRecords = Offer::count();
        $dataPaging = Offer::paginate(15);
        return view('modules.offers.offers_search', compact('dataOffers', 'dataPaging', 'totalRecords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Offer $offer
     * @return Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Offer $offer
     * @return Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Offer $offer
     * @return Response
     */
    public function destroy(Offer $offer)
    {
        //
    }

    /**
     * Report creation the specified resource from storage.
     *
     * @return BinaryFileResponse
     */
    public function exportExcel()
    {
        // Query limiters
        ini_set('memory_limit', '1024');
        set_time_limit(1000);

        return Excel::download(new OffersExport, 'OffersData.xlsx');
    }

    /**
     * Apply filters for the specified resource from storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function showFilters(Request $request)
    {
        $query = (new OffersSearch)->filter($request);

        $dataOffers = $query->select(
            "offer_id",
            "creator",
            "object",
            "activity_id",
            "description",
            "currency",
            "budget",
            "start_date",
            "start_time",
            "end_date",
            "end_time",
            "status_id")->get()->map(function ($item) {
            $item->start_date = Carbon::parse($item->start_date)->format("Y-m-d");
            $item->end_date = Carbon::parse($item->end_date)->format("Y-m-d");
            return $item;
        });

        $totalRecords = $query->count();
        $dataPaging = Offer::paginate(15);

        return view('modules.offers.offers_search', compact('dataOffers', 'dataPaging', 'totalRecords'));
    }
}
