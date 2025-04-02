<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Sports Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f6faf8;
    }
    .profile-container {
        width: 50%;
        margin: 50px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .profile-header {
        margin-bottom: 20px;
    }
    .profile-pic {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
    }
    .profile-details {
        text-align: left;
    }
    ul {
        list-style: none;
        padding: 0;
    }
    ul li {
        background: #d4edda;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
    }
    button {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        border-radius: 5px;
    }
    button:hover {
        background: #218838;
    }


    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="{{ asset("/assets/img/profilepic.png") }}" alt="User Profile" class="profile-pic">
            <h1>Mohammad</h1>
            <p>Email: mohammad@example.com</p>
            <p>Phone: 07777777</p>
        </div>
        <div class="profile-details">
            <h2>Booking History</h2>
            <ul>
                <li>Football - Date: </li>
                <li>Basketball - Date:</li>
                <li>Tennis - Date: </li>
                <li>Vollyball - Date:</li>
            </ul>
            <h2>Profile Settings</h2>
            <button onclick="logout()">Logout</button>
        </div>
    </div>

    
</body>
</html>

