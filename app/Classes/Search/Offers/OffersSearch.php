<?php

namespace App\Classes\Search\Offers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OffersSearch
{
    /**
     * Retrieve resources based on stored resources.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function filter(Request $request) {
        $query = (new Offer)->newQuery();

        $query = $this->applyFilters($query, $request);

        return $query;
    }

    private function applyFilters($query, $request)
    {
        $filters = $this->getNameFilters();

        foreach ($filters as $filter){
            $filterClass = __NAMESPACE__ . "\\Filters\\" . $filter; // Obtención de namespace de filters obtenidos del array.
            if(class_exists($filterClass)){
                $query = $filterClass::apply($query, $request); // Aplicamos filtros correspondientes.
            }
        }
        return $query;
    }

    private function getNameFilters(): array
    {
        $allFilters = scandir(app_path('/Classes/Search/Offers/Filters'));
        $filters = array_diff($allFilters, array('.', '..'));
        $nameFilter = [];

        foreach ($filters as $filter){
            $nameFilter[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter); // Limpiamos el nombre del archivo clase de su extensión de archivo.
        }
        return $nameFilter;
    }
}
