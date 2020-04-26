<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {

        $validate = $this->validate($request, [
           'query' => 'string|required|min:4'
        ]);

        $query = $request->get('query');

        if ($validate) {
            return ['result' => $this->searchService->search($query)];
        }
    }
}
