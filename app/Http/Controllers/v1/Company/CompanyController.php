<?php

namespace App\Http\Controllers\v1\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
//    public function getCompanyCoordinates(): JsonResponse
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $companies = Company::with('addresses')->get();

        $addresses = $companies->map(function ($company) {
            return [
                'name' => $company->title,
                'addresses' => $company->addresses->map(function ($address) {
                    return [
                        'full_address' => $address->full_address,
                        'latitude' => $address->latitude,
                        'longitude' => $address->longitude,
                    ];
                }),
            ];
        });

//        return response()->json($coordinates);
        return view('index', compact('addresses'));
    }
}
