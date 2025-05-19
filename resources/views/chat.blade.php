<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Team Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        #sidebar {
            width: 25%;
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
            overflow-y: auto;
        }
        #chatbox {
            width: 75%;
            display: flex;
            flex-direction: column;
        }
        .list-title {
            text-align: center;
            padding: 10px;
            font-weight: bold;
            background-color: #007bff;
            color: white;
        }
        .team, .admin {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }
        .team:hover, .admin:hover {
            background-color: #e9ecef;
        }
        #messages {
            flex-grow: 1;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            overflow-y: auto;
        }
        #input-section {
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #ddd;
        }
        #input-section input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #input-section button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #input-section button:hover {
            background-color: #0056b3;
        }
        .msg_cotainer, .msg_cotainer_send {
            padding: 10px;
            border-radius: 10px;
            max-width: 60%;
            margin-bottom: 10px;
        }
        .msg_cotainer {
            background-color: #f1f1f1;
            align-self: flex-start;
        }
        .msg_cotainer_send {
            background-color: #007bff;
            color: #fff;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    <!-- Sidebar for Team and Admin List -->
    <div id="sidebar">
        <div>
            <div class="list-title">Teams</div>
            <div id="team-list"></div>
        </div>
        <div>
            <div class="list-title">Admins</div>
            <div id="admin-list"></div>
        </div>
    </div>

    <!-- Chatbox Section -->
    <div id="chatbox">
        <div id="messages"></div>
        <div id="input-section">
            <input type="text" id="message" placeholder="Enter your message" onkeydown="checkEnter(event)">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script src="https://cdn.socket.io/4.5.1/socket.io.min.js"></script>
    <script>
        const socket = io("https://recstep.com:3001", {
            path: "/socket.io",
            transports: ["websocket", "polling"],
        });

        const teamListDiv = document.getElementById("team-list");
        const adminListDiv = document.getElementById("admin-list");
        const messagesDiv = document.getElementById("messages");
        let selectedId = null;
        let recipientType = null; // 'team' or 'admin'

        // Fetch and render Teams and Admins
        function renderLists() {
            // Fetch Teams
            fetch(`/api/getteams`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        data.teams.forEach((team) => {
                            const teamDiv = document.createElement("div");
                            teamDiv.className = "team";
                            teamDiv.textContent = team.name;
                            teamDiv.onclick = () => loadChat(team.id, "team");
                            teamListDiv.appendChild(teamDiv);
                        });
                    } else {
                        console.error("Failed to load teams");
                    }
                })
                .catch((error) => console.error("Error loading teams:", error));

            // Fetch Admins
            fetch(`/api/getadmins`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        data.admins.forEach((admin) => {
                            const adminDiv = document.createElement("div");
                            adminDiv.className = "admin";
                            adminDiv.textContent = admin.name;
                            adminDiv.onclick = () => loadChat(admin.id, "admin");
                            adminListDiv.appendChild(adminDiv);
                        });
                    } else {
                        console.error("Failed to load admins");
                    }
                })
                .catch((error) => console.error("Error loading admins:", error));
        }

        // Load chat for a selected Team or Admin
        function loadChat(id, type) {
            selectedId = id;
            recipientType = type;
            messagesDiv.innerHTML = ""; // Clear previous messages
            // Fetch chat messages
            fetch(`/api/teams/${type}/${id}/messages`)
                .then((response) => response.json())
                .then((data) => {
                    data.messages.forEach((msg) => {
                        addMessage(msg.message, msg.type);
                    });
                })
                .catch((error) => console.error("Error loading messages:", error));
        }

        // Send message
        function sendMessage() {
            const messageInput = document.getElementById("message");
            const message = messageInput.value.trim();

            if (message !== "" && selectedId !== null) {
                // Emit the message to the server
                socket.emit("message", { id: selectedId, type: recipientType, text: message });

                // Add to chat UI only if not handled by the server response
                addMessage(message, "outgoing");

                // Send message to the backend
                fetch(`/api/teams/${recipientType}/${selectedId}/messages`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message }),
                }).catch((error) => console.error("Error sending message:", error));

                messageInput.value = ""; // Clear input field
            } else {
                alert("Please select a recipient first!");
            }
        }

        // Add message to the chat UI
        function addMessage(msg, type) {
            const messageElement = document.createElement("div");
            messageElement.className = type === "incoming" ? "msg_cotainer" : "msg_cotainer_send";
            messageElement.textContent = msg;
            messagesDiv.appendChild(messageElement);

            // Auto-scroll to the bottom
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }

        // Listen for incoming messages
        socket.on("message", (data) => {
            if (data.id === selectedId && data.type === recipientType) {
                addMessage(data.text, "incoming");
            }
        });

        // Initialize the app
        renderLists();

        // Function to check if Enter is pressed
        function checkEnter(event) {
            if (event.key === "Enter" || event.keyCode === 13) {
                sendMessage();
            }
        }
    </script>
</body>
</html>
