<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;

class OpportunityController extends Controller
{
    //
    public function filter(Request $request)
    {
        $query = Opportunity::query();

        // Filter by created_at
        if ($request->has('created_at')) {
            $query->whereDate('created_at', '=', $request->created_at);
        }

        // Filter by contact
        if ($request->has('contact')) {
            $query->where('contact', 'like', '%' . $request->contact . '%');
        }

        // Filter by responsible
        if ($request->has('responsible')) {
            $query->where('responsible', 'like', '%' . $request->responsible . '%');
        }

        // Filter by search text
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('transaction_name', 'like', '%' . $request->search . '%')
                  ->orWhere('organization', 'like', '%' . $request->search . '%')
                  ->orWhere('contact', 'like', '%' . $request->search . '%')
                  ->orWhere('responsible', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by tag (Assuming you have a 'tags' column or relation)
        if ($request->has('tag')) {
            $query->where('tag', 'like', '%' . $request->tag . '%');
        }

        // Execute the query and return the result
        $opportunities = $query->get();

        return response()->json($opportunities);
    }
}
