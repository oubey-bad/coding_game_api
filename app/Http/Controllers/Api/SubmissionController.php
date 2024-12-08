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
        // Validate the request
        $request->validate([
            "problem_id" => "required|exists:problems,id",
            "user_id" => "required|exists:users,id",
            "language" => "required|string",
            "code" => "required|string",
            "input" => "nullable|string",  // Inputs as string, will split by newline
        ]);

        // Find the problem
        $problem = Problem::findOrFail($request->problem_id);

        // Get the inputs for the code execution (if provided)
        $inputs = $request->input('input') ? explode(" ", $request->input('input')) : [];

        // Get the expected output from the problem
        // $expectedOutput = $problem->expected;
        $expectedOutput = "'1\n";

        // Call the custom execution method
        $executionResult = $this->executeCode($request->code, $request->language, $inputs);

        if (isset($executionResult['error'])) {
            // Handle execution errors
            return response()->json(['message' => 'Code execution failed.', 'error' => $executionResult['error']], 500);
        }

        // Compare actual output with expected output
        if (trim($executionResult['output']) === trim($expectedOutput)) {
            return response()->json([
                'message' => 'Success! Your code passed all test cases.',
                'output' => $executionResult['output']
            ]);
        } else {
            return response()->json([
                'message' => 'Failed! Your code output is incorrect.',
                'output' => $executionResult['output']
            ]);
        }
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
