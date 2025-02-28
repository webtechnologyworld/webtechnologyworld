<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the prompt from the form
    $prompt = escapeshellarg($_POST['prompt']); // Sanitize the input to prevent shell injection

    // Define the path to the Ollama binary
    $ollama_bin = '/home/username/public_html/ollama/bin/ollama'; // Adjust the path

    // Prepare the command to run Ollama
    $command = "$ollama_bin run gpt-3 --prompt $prompt";

    // Execute the command and capture the output
    $output = shell_exec($command);

    // Show the result in the browser
    echo "<h1>Ollama Output:</h1>";
    echo "<pre>$output</pre>";
} else {
    echo "Invalid request method.";
}
?>
