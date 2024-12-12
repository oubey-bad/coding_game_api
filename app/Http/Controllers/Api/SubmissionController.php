<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Submission;
use App\Models\TestCases;
use App\Models\UserScores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function gameEnd(Request $request)
     {
         // Create a new UserScores instance
         $user_scores = new UserScores();
     
         // Assign the user ID
         $user_scores->user_id = $request->user->id;
     
         // Assign the time from the request
         $user_scores->time = $request->time;
     
         // Calculate the total score
         $user_scores->total_score = Submission::where('user_id', $request->user->id)->sum('total_points');
     
        //qualified logic 
        //status changes ..


         // Save the new user score
         $user_scores->save();
     
         return response()->json(['success' => true, 'message' => 'Score saved successfully']);
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Submission $submission)
    {
        $problem = Problem::findOrFail($submission);
        return response()->json($problem);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            "problem_id" => "required|exists:problems,id",
            "user_id" => "required|exists:users,id",
            "language" => "required|string",
            "code" => "required|string",
            // "input" => "nullable|string",  // Inputs as string, will split by newline
        ]);

        // Find the problem
        $problem = Problem::findOrFail($request->problem_id);

        // Fetch all test cases for the problem
        $testCases = TestCases::where('problem_id', $request->problem_id)->get();

        // Variables to track results
        $totalCases = $testCases->count();
        $passedCases = 0;

        foreach ($testCases as $testCase) {
            // Define headers for the API request
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            // Prepare the request body
            $body = [
                'code' => $request->input('code'), // User's submitted code
                'language' => $request->input('language'), // Programming language (e.g., Python, C++)
                'input' => $testCase->input_data, // Input from the test case
            ];

            try {
                // Send the request to the code execution API
                $response = Http::withHeaders($headers)
                    ->post('https://api.codex.jaagrav.in', $body);

                $result = $response->json();

                // Compare output with the expected output
                if (trim($result['output'] ?? '') === trim($testCase->expected_output)) {
                    $passedCases++;
                }
            } catch (\Exception $e) {
                // Log the exception or handle it as needed
                continue; // Skip this test case on error
            }
        }

        // Calculate accuracy percentage
        $accuracy = ($passedCases / $totalCases) * 100;
        $request['accuracy'] = $accuracy;
        Submission::created($request);
        // Return accuracy percentage
        return response()->json([
            'success' => true,
            'accuracy' => round($accuracy, 2), // Rounded to 2 decimal places
        ]);
    }

    public function checkAccuracy(Request $request)
    {
        // Find the problem
        // $problem = Problem::findOrFail($request->problem_id);

        // Fetch all test cases for the problem
        $testCases = TestCases::where('problem_id', $request->problem_id)->get();

        // Variables to track results
        $totalCases = $testCases->count();
        $passedCases = 0;

        foreach ($testCases as $testCase) {
            // Define headers for the API request
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            // Prepare the request body
            $body = [
                'code' => $request->input('code'), // User's submitted code
                'language' => $request->input('language'), // Programming language (e.g., Python, C++)
                'input' => $testCase->input_data, // Input from the test case
            ];

            try {
                // Send the request to the code execution API
                $response = Http::withHeaders($headers)
                    ->post('https://api.codex.jaagrav.in', $body);

                $result = $response->json();

                // Compare output with the expected output
                if (trim($result['output'] ?? '') === trim($testCase->expected_output)) {
                    $passedCases++;
                }
            } catch (\Exception $e) {
                // Log the exception or handle it as needed
                continue; // Skip this test case on error
            }
        }

        // Calculate accuracy percentage
        $accuracy = ($passedCases / $totalCases) * 100;

        // Return accuracy percentage
        return response()->json([
            'success' => true,
            'accuracy' => round($accuracy, 2), // Rounded to 2 decimal places
        ]);
    }


    /**
     * Execute the code using the custom compiler method.
     *
     * @param string $code
     * @param string $language
     * @param array $inputs
     * @return array
     */
    private function executeCode($code, $language, $inputs)
    {
        // Map file extensions and execution commands
        $fileNames = [
            'python' => 'script.py',
            'javascript' => 'script.js',
            'c' => 'script.c',
            'cpp' => 'script.cpp',
            'java' => 'Main.java',
            'php' => 'script.php',
        ];

        $commands = [
            'python' => 'python3 script.py',
            'javascript' => 'node script.js',
            'c' => 'gcc script.c -o script && ./script',
            'cpp' => 'g++ script.cpp -o script && ./script',
            'java' => 'javac Main.java && java Main',
            'php' => 'php script.php',
        ];

        // Check for unsupported languages
        if (!array_key_exists($language, $fileNames)) {
            return ['error' => 'Unsupported language'];
        }

        // Create a temporary directory for code execution
        $tempDir = storage_path('app/compiler');
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Save code to a file
        $fileName = $fileNames[$language];
        $filePath = $tempDir . DIRECTORY_SEPARATOR . $fileName;
        file_put_contents($filePath, $code);

        // Prepare the command
        $command = $commands[$language];

        // If inputs are provided, pipe them to the program
        $inputString = implode(" ", $inputs);
        $output = null;

        try {
            $output = shell_exec("cd {$tempDir} && echo '{$inputString}' | {$command} 2>&1");
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }

        return ['output' => $output];
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
