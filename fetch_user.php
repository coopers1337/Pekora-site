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

// Start with user ID 10901
$userId = 10901;
$userResponse = fetchUser($userId);

// Check if user exists or not
if (isset($userResponse['errors']) && $userResponse['errors'][0]['message'] === 'NotFound') {
    echo json_encode(['error' => 'NotFound']);
} else {
    $avatarResponse = fetchAvatar($userId);
    $userResponse['avatar'] = $avatarResponse;
    echo json_encode($userResponse);
}
?>
