<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "problem_id" => "",
            "user_id" => "",
            "language" => "",
            "code" => "",
        ]);
        $problem = Problem::findOrFail($request->problem_id);

        $headers = [
            'Accept' => '*/*',
            // 'Authorization' => '9411c90e217daa6b259c78dd79bcf951', // Replace with your API key
            'Content-Type' => 'application/json',
        ];

        // Prepare the body
        $body = [
            'code' => $request->code,
            'language' => 'py',
            'input' => '7 \n3',
        ];

        $response = Http::withHeaders($headers)
            ->post('https://api.codex.jaagrav.in', $body);

        $result = $response->json();
        dd($result);
        $ex = "[1, 4, 9, 16, 25]";

            if (trim($result['output']) === trim($ex)) {
                return response()->json(['message' => 'Success! Your code passed all test cases.', 'output' => $result['output']]);
            } else {
                return response()->json(['message' => 'Failed! Your code output is incorrect.', 'output' => $result['output']]);
            }
        








        // $response = Http::withHeaders($headers)
        //         ->post('https://api.codex.jaagrav.in', $body);

        //         $result = $response->json();
        // while ($result['error'] === '') {


        //     if (trim($result['output']) === trim($problem->expected_output)) {
        //         return response()->json(['message' => 'Success! Your code passed all test cases.', 'output' => $result['output']]);
        //     } else {
        //         return response()->json(['message' => 'Failed! Your code output is incorrect.', 'output' => $result['output']]);
        //     }



        //     $response = Http::withHeaders($headers)
        //         ->post('https://api.codex.jaagrav.in', $body);

        //         $result = $response->json();
        // }



    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
