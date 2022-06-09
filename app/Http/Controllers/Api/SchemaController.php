<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchemaDetail;


class SchemaController extends Controller
{
    protected $successStatus = 200;
    public function getSchemaDetail(Request $request)
    {
        try {
            $detailAttr = SchemaDetail::select('response')
                                ->where('website_url',$request->website_url)
                                ->where('deleted_at',NULL)
                                ->first();
           
            return response()->json([
                'data' => $detailAttr,
            ]);
        } catch (Exception $ex) {
            if (env('APP_DEBUG') == false && env('APP_ENV') != 'local') {
                //Bugsnag::notifyException($ex);
            }
        }
    }
}
