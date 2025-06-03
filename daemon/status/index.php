<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$incomingState = $input['state'] ?? '-1';
$newState = $incomingState + 1;
$time = date('g:i:s A');

$response = [
    'state' => "$newState",
    'nextRun' => floor(microtime(true) * 1000) + 50000, // 50 seconds in ms
    'messages' => [
        'counter' => [
            'title' => 'Count',
            'body' => "The current count is: $newState",
        ]
    ],
    'statusXml' => "<span>Count: $newState @ $time</span>",
    // 'now' => floor(microtime(true) * 1000),  // Default is Date.now() in JS
];

echo json_encode($response);
?>