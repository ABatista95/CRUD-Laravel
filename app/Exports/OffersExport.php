<?php

namespace App\Exports;

use App\Models\Offer;
use App\Models\OfferStatus;
Use App\Models\ProductClasses;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OffersExport implements FromView //FromCollection
{
    /**
    * @return Collection
    */
    /*public function collection(): Collection
    {

        return Offer::select(
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
            $item->status_id = $item->statusOffer->name;
            $item->activity_id = $item->activityOffer->name;

            return $item;
        });
    }*/

    /**
     * @return View Con formato personalizado.
     */
    public function view(): View
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
            "start_time",
            "end_date",
            "end_time",
            "status_id")->get()->map(function ($item) {
            $item->start_date = Carbon::parse($item->start_date)->format("Y-m-d");
            $item->end_date = Carbon::parse($item->end_date)->format("Y-m-d");
            $item->status_id = $item->statusOffer->name;
            $item->activity_id = $item->activityOffer->name;
        });

        return view('modules.offers.components.offers_table', ['dataOffers' => Offer::all()]);
    }
}
