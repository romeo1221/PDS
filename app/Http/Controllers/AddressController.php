<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        // $validatedData = $request->validate([
        //     'address_type' => 'boolean',
        //     'country' => 'required_if:address_type,Permanent|string',
        //     'province' => 'required_if:address_type,Permanent|string',
        //     'city' => 'required_if:address_type,Permanent|string',
        //     'barangay' => 'required_if:address_type,Permanent|string',
        //     'house_number' => 'required_if:address_type,Permanent|string',
        //     'zip_code' => 'required_if:address_type,Permanent|string',
        //     'temp_country' => 'nullable|string',
        //     'temp_province' => 'nullable|string',
        //     'temp_city' => 'nullable|string',
        //     'temp_barangay' => 'nullable|string',
        //     'temp_house_number' => 'nullable|string',
        //     'temp_zip_code' => 'nullable|string',
        // ]);

        // // Create a new AddressInfo record
        // $addressInfo = Address::create($validatedData);

        $address = new Address();
        $address->address_type = $request->addressType;
        $address->country = $request->country;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->barangay = $request->barangay;
        $address->house_number = $request->houseNumber;
        $address->zip_code = $request->zipCode;
        $address->temp_country = $request->tempCountry;
        $address->temp_province = $request->tempProvince;
        $address->temp_city = $request->tempCity;
        $address->temp_barangay = $request->tempBarangay;
        $address->temp_house_number = $request->tempHouseNumber;
        $address->temp_zip_code = $request->tempZipCode;
        $address->save();


        // Return a response indicating success
        return response()->json(['message' => 'Address information saved successfully!', 'data' => $address], 201);
    }
}
