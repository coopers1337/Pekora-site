<?php
header('Content-Type: application/json');

function fetchUser($userId) {
    $url = "https://www.pekora.zip/apisite/users/v1/users/$userId";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function fetchAvatar($userId) {
    $url = "https://www.pekora.zip/apisite/thumbnails/v1/users/avatar-headshot?userIds=$userId&size=420x420&format=png";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return isset($data['data'][0]) ? $data['data'][0] : null;
}

$latestUserId = 10900;
$nextUserId = 10901;

// Fetch latest user (10900)
$latestUserResponse = fetchUser($latestUserId);
$latestAvatarResponse = fetchAvatar($latestUserId);

// Fetch next user (10901)
$nextUserResponse = fetchUser($nextUserId);
$nextAvatarResponse = fetchAvatar($nextUserId);

// Prepare response
$response = [
    'latestUser' => $latestUserResponse['errors'] ? null : $latestUserResponse,
    'latestAvatar' => $latestAvatarResponse,
    'nextUser' => $nextUserResponse['errors'] && $nextUserResponse['errors'][0]['message'] === 'NotFound' ? ['error' => 'NotFound'] : $nextUserResponse,
    'nextAvatar' => $nextAvatarResponse
];

echo json_encode($response);
?>
