<?php
// Laravel implementation for backend filtering

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{


    /**
     * Search for addresses and filter to only show Canadian results
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {


            return view('pages.address');


        $query = $request->input('q');

        if (strlen($query) < 3) {
            return response()->json([]);
        }

        // Get addresses from your address provider API
        // Replace this with your actual address provider API
        $response = Http::get('https://your-address-provider.com/api/search', [
            'query' => $query,
            'api_key' => config('services.address_provider.api_key'),
        ]);

        if (!$response->successful()) {
            return response()->json(['error' => 'Failed to fetch address data'], 500);
        }

        $addresses = $response->json()['results'] ?? [];

        // Filter to only Canadian addresses
        $canadianAddresses = $this->filterCanadianAddresses($addresses);

        return response()->json($canadianAddresses);
    }

    /**
     * Filter addresses to only include Canadian ones
     *
     * @param array $addresses
     * @return array
     */
    private function filterCanadianAddresses($addresses)
    {
        return array_filter($addresses, function($address) {
            // Canadian postal code regex pattern
            $postalCodePattern = '/[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d/';

            // Get the address text based on your data structure
            $addressText = $address['text'] ?? '';

            // Check if it matches Canadian postal code format
            if (preg_match($postalCodePattern, $addressText)) {
                return true;
            }

            // Canadian provinces/territories
            $canadianProvinces = [
                'AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT',
                'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland',
                'Nova Scotia', 'Northwest Territories', 'Nunavut', 'Ontario',
                'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon'
            ];

            // Check if address contains any Canadian province
            foreach ($canadianProvinces as $province) {
                if (strpos($addressText, "$province,") !== false ||
                    strpos($addressText, "$province ") !== false ||
                    substr($addressText, -strlen($province)) === $province) {
                    return true;
                }
            }

            return false;
        });
    }
}
