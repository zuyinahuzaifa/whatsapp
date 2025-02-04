
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Clone</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #d1d7db;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            height: 100vh;
            display: flex;
        }

        /* Left Sidebar */
        .sidebar {
            width: 30%;
            background: #ffffff;
            border-right: 1px solid #e9edef;
        }

        .header {
            background: #f0f2f5;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #128C7E;
        }

        .search-container {
            padding: 12px;
            background: #f0f2f5;
        }

        .search-box {
            background: white;
            padding: 8px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
        }

        .search-box input {
            border: none;
            outline: none;
            margin-left: 10px;
            width: 100%;
        }

        /* Chat List */
        .chat-list {
            overflow-y: auto;
            height: calc(100vh - 120px);
        }

        .chat-item {
            padding: 12px 16px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e9edef;
            cursor: pointer;
        }

        .chat-item:hover {
            background: #f0f2f5;
        }

        .chat-details {
            margin-left: 15px;
        }

        .chat-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .last-message {
            color: #667781;
            font-size: 13px;
        }

        /* Main Chat Area */
        .main-chat {
            width: 70%;
            display: flex;
            flex-direction: column;
            background: #efeae2;
        }

        .chat-header {
            background: #f0f2f5;
            padding: 10px 16px;
            display: flex;
            align-items: center;
        }

        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .message {
            max-width: 65%;
            padding: 8px 12px;
            margin: 8px;
            border-radius: 7.5px;
            position: relative;
        }

        .received {
            background: white;
            float: left;
            clear: both;
        }

        .sent {
            background: #d9fdd3;
            float: right;
            clear: both;
        }

        .message-time {
            font-size: 11px;
            color: #667781;
            float: right;
            margin-left: 10px;
        }

        .chat-input {
            background: #f0f2f5;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .chat-input input {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            margin: 0 10px;
            outline: none;
        }

        .send-btn {
            background: #128C7E;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .send-btn:hover {
            background: #075E54;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="header">
                <div class="profile-img"></div>
                <div class="header-icons">
                    <!-- Add icons here -->
                </div>
            </div>
            <div class="search-container">
                <div class="search-box">
                    <span>🔍</span>
                    <input type="text" placeholder="Search or start new chat">
                </div>
            </div>
            <div class="chat-list">
                <?php
                // Sample chat list data
                $chats = [
                    ['name' => 'John Doe', 'message' => 'Hello there!'],
                    ['name' => 'Jane Smith', 'message' => 'How are you?'],
                    ['name' => 'Family Group', 'message' => 'Mom: Dinner at 8'],
                ];

                foreach ($chats as $chat) {
                    echo '<div class="chat-item">
                            <div class="profile-img"></div>
                            <div class="chat-details">
                                <div class="chat-name">' . $chat['name'] . '</div>
                                <div class="last-message">' . $chat['message'] . '</div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="main-chat">
            <div class="chat-header">
                <div class="profile-img"></div>
                <div class="chat-details">
                    <div class="chat-name">John Doe</div>
                    <div class="last-message">online</div>
                </div>
            </div>
            <div class="chat-messages">
                <?php
                // Sample messages
                $messages = [
                    ['text' => 'Hi there!', 'type' => 'received', 'time' => '10:30 AM'],
                    ['text' => 'Hello! How are you?', 'type' => 'sent', 'time' => '10:31 AM'],
                    ['text' => 'I\'m good, thanks!', 'type' => 'received', 'time' => '10:32 AM'],
                ];

                foreach ($messages as $message) {
                    echo '<div class="message ' . $message['type'] . '">
                            ' . $message['text'] . '
                            <span class="message-time">' . $message['time'] . '</span>
                        </div>';
                }
                ?>
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Type a message">
                <button class="send-btn">Send</button>
            </div>
        </div>
    </div>

    <?php
    // Add any PHP processing logic here
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle message sending
        if (isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);
            // Add your database logic here
        }
    }
    ?>
</body>
</html>
