<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportDataRequest;
use App\Services\StoreDataService;

class DataImportController extends Controller
{
    public function store(ImportDataRequest $request, StoreDataService $storeDataService)
    {
        return $storeDataService->storeNewData($request->file);
    }
}
