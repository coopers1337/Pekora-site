<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Auto-Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: linear-gradient(#080808 2px,transparent 0),linear-gradient(90deg,#080808 2px,transparent 0),linear-gradient(#0c0c0c 1px,transparent 0),linear-gradient(90deg,#080808 1px,#000 0);
            background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
            background-position: -2px -2px, -2px -2px, -1px -1px, -1px -1px;
            color: #fff;
            position: relative;
            --bs-body-font-family: 'Inter', sans-serif !important;
            --bs-border-color: rgb(60, 60, 60) !important;
            --bs-body-bg: rgba(10, 10, 10, 0.7) !important;
        }
        h1 {
            font-size: x-large !important;
            margin: 0;
        }
        h4 {
            color: rgb(180, 180, 180);
            font-size: 12px;
        }
        a {
            text-decoration: none !important;
        }
        #userInfo {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid var(--bs-border-color);
            border-radius: 8px;
            background-color: rgba(20, 20, 20, 0.8);
        }
        #status {
            color: rgb(255, 100, 100);
            margin-top: 10px;
            font-size: 14px;
        }
        #avatar {
            max-width: 200px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>User Info Checker</h1>
        <h4>Auto-updates every 30 seconds</h4>
        <div id="userInfo" class="col-md-6">Loading...</div>
        <div id="status"></div>
    </div>

    <script>
        function fetchUserInfo() {
            fetch('fetch_user.php')
                .then(response => response.json())
                .then(data => {
                    const userInfoDiv = document.getElementById('userInfo');
                    const statusDiv = document.getElementById('status');
                    if (data.error) {
                        userInfoDiv.innerHTML = '<p>User not found.</p>';
                        statusDiv.innerHTML = 'Checking for new user...';
                    } else {
                        const avatarHtml = data.avatar && data.avatar.state === 'Completed' 
                            ? `<img id="avatar" src="https://www.pekora.zip${data.avatar.imageUrl}" alt="User Avatar">`
                            : '<p>No avatar available.</p>';
                        userInfoDiv.innerHTML = `
                            ${avatarHtml}
                            <p><strong>User ID:</strong> ${data.id}</p>
                            <p><strong>Name:</strong> ${data.name}</p>
                            <p><strong>Display Name:</strong> ${data.displayName}</p>
                            <p><strong>Created:</strong> ${new Date(data.created).toLocaleString()}</p>
                            <p><strong>RAP:</strong> ${data.inventory_rap}</p>
                            <p><strong>Verified:</strong> ${data.hasVerifiedBadge ? 'Yes' : 'No'}</p>
                            <p><strong>Staff:</strong> ${data.isStaff ? 'Yes' : 'No'}</p>
                            <p><strong>Banned:</strong> ${data.isBanned ? 'Yes' : 'No'}</p>
                            <p><strong>Description:</strong> ${data.description || 'None'}</p>
                        `;
                        statusDiv.innerHTML = 'User found! Checking again in 30 seconds...';
                    }
                })
                .catch(error => {
                    document.getElementById('status').innerHTML = 'Error fetching data: ' + error;
                });
        }

        fetchUserInfo();
        setInterval(fetchUserInfo, 30000);
    </script>
</body>
</html>
