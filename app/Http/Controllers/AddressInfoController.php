<?php

namespace App\Http\Controllers;

use App\Models\AddressInfo;
use Illuminate\Http\Request;

class AddressInfoController extends Controller
{
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'address_type' => 'required|string',
            'country' => 'required_if:addressType,Permanent|string',
            'province' => 'required_if:addressType,Permanent|string',
            'city' => 'required_if:addressType,Permanent|string',
            'barangay' => 'required_if:addressType,Permanent|string',
            'house_number' => 'required_if:addressType,Permanent|string',
            'zip_code' => 'required_if:addressType,Permanent|string',
            'temp_country' => 'nullable|string',
            'temp_province' => 'nullable|string',
            'temp_city' => 'nullable|string',
            'temp_barangay' => 'nullable|string',
            'temp_house_number' => 'nullable|string',
            'temp_zip_code' => 'nullable|string',
        ]);

        // Create or update AddressInfo record
        AddressInfo::updateOrCreate(
            ['user_id' => auth()->id()], // Assuming you have user authentication
            $validatedData
        );

        return response()->json(['message' => 'Address information saved successfully!']);
    }
}
