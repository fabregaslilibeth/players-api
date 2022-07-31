<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportDataRequest;
use App\Services\StoreDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataImportController extends Controller
{
    public function store(ImportDataRequest $request, StoreDataService $storeDataService)
    {
    //        $fileSize = $request->file->getSize();
    //
    //        if ($fileSize > 10240000) {
    //            return response()->json(['message' => 'Upload limit is 10Mb.'], 422);
    //        };
    //
    //        $acceptedFormats = [
    //            'text/plain', 'application/json'
    //        ];
    //
    //        if (! in_array($request->file->getMimeType(), $acceptedFormats)) {
    //            return response()->json(['message' => 'Please try again. This file type is not accepted.'], 422);
    //        }

        return $storeDataService->storeNewData($request->file);


//        return redirect()->back();

//{
//"firstName": "Joe",
//"lastName": "Jackson",
//"gender": "male",
//"age": 28,
//"address": {
//"streetAddress": "101",
//"city": "San Diego",
//"state": "CA"
//},
//"phoneNumbers": [
//{ "type": "home", "number": "7349282382" }
//]
//}

//        $json->each(function () {
//
//        });
//        foreach($json as $line) {
//            echo ($line);
//        }
//        return $json;


    }

    public function show($fileStorageId)
    {
        $fileStorage = FileStorage::find($fileStorageId);

        $path = storage_path('app/templates/' . $fileStorage->filename);

        $headers = SimpleExcelReader::create($path)
            ->getHeaders();

        return response()->json(['templateImport' => $fileStorage, 'headers' => $headers]);
    }
}
