<style>
    .img_cont {
    position: relative;
    width: 50px; /* Adjust based on your design */
    height: 50px; /* Adjust based on your design */
}

.unread-count {
    position: absolute;
    top: -5px; /* Adjust the position based on your design */
    right: -5px; /* Adjust the position based on your design */
    font-size: 12px; /* Adjust font size for the badge */
    background-color: #dc3545; /* Danger color for Bootstrap */
    color: #fff; /* White text */
    padding: 2px 6px; /* Adjust padding for badge size */
    border-radius: 50%; /* Rounded badge */
    min-width: 20px; /* Ensure consistent size */
    text-align: center;
    line-height: 20px;
}

</style>
<div class="footer">
                <div class="copyright">
                    <p>Copyright © 2024 - All Right Reserved By RECSTEP</p>
                </div>
            </div>
            </div>
<input type="hidden" id="sender_id" value="{{auth()->user()->id}}">
<input type="hidden" id="selectedId" value="">

<input type="hidden" id="sender_profile" value="{{auth()->user()->profile_picture}}">
@if(auth()->user()->receiver)
    @if(auth()->user()->receiver->sender)
    <input type="hidden" id="receiver_profile" value="{{auth()->user()->receiver->sender->profile_picture}}">
     @else
    <input type="hidden" id="receiver_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
    @endif
@else
<input type="hidden" id="receiver_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
@endif
<input type="hidden" id="second_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
            <!-- Required vendors -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
       <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        <!-- Apex Chart -->
        <script src="{{asset('assets/vendor/apexchart/apexchart.js')}}"></script>
        <script src="{{asset('assets/vendor/chart-js/chart.bundle.min.js')}}"></script>
        <!-- Chart piety plugin files -->
        <script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
        <!-- Dashboard 1 -->
        <script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{asset('assets/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/ic-sidenav-init.js')}}"></script>
        <!-- <script src="js/demo.js"></script> -->
        <!-- <script src="js/styleSwitcher.js"></script> -->
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

       function renderLists() {
    const teamListDiv = document.getElementById('team-list'); // Replace with your team's container element ID
    teamListDiv.innerHTML = ''; // Clear existing list

    const unreadCountSpan = document.getElementById('unread-count');

    // Fetch Admins and Teams
    Promise.all([
        fetch(`/api/getadmins`).then((response) => response.json()),
        fetch(`/api/getteams`).then((response) => response.json()),
    ])
        .then(([adminsData, teamsData]) => {
            // Process Admins
            if (adminsData.success) {
                // Sort admins by `last_activity` or similar property (newest first)
                const unreadCount = adminsData.admins.reduce((count, admin) => count + admin.unread_messages_count, 0);
                unreadCountSpan.textContent = unreadCount;

                const sortedAdmins = adminsData.admins.sort(
                    (a, b) => new Date(b.last_activity) - new Date(a.last_activity)
                );

                // Append sorted admins to the list
                sortedAdmins.forEach((admin) => {
                    const adminLi = createUserLi(admin, 'admin');
                    teamListDiv.appendChild(adminLi);
                });
            } else {
                console.error("Failed to load admins");
            }

            // Process Teams
            if (teamsData.success) {
                // Sort teams by `last_activity` or similar property (newest first)
                const sortedTeams = teamsData.teams.sort(
                    (a, b) => new Date(b.last_activity) - new Date(a.last_activity)
                );

                // Append sorted teams to the list after admins
                sortedTeams.forEach((team) => {
                    const teamLi = createUserLi(team, 'team');
                    teamListDiv.appendChild(teamLi);
                });
            } else {
                console.error("Failed to load teams");
            }
        })
        .catch((error) => console.error("Error loading admins or teams:", error));
}



        // Helper function to create an <li> for a user
  function createUserLi(user, type) {

    const userLi = document.createElement('li');
    userLi.className = 'ic-chat-user';
    userLi.innerHTML = `
        <div class="d-flex bd-highlight">
            <div class="img_cont position-relative" id="imgCount${type}${user.id}">
                <img src="${user.profile_picture ? user.profile_picture : '{{ asset('assets/images/dummyUser.jpg') }}'}" 
                    class="rounded-circle user_img" alt="">
                <span class="online_icon ${user.is_online ? '' : 'offline'}"></span>
                ${
                    user.unread_messages_count > 0
                        ? `<span class="badge badge-pill badge-danger unread-count" id="count_${user.id}" onclick="handleUnreadClick(${user.id})">${user.unread_messages_count}</span>`
                        : ''
                }
            </div>
            <div class="user_info">
                <span>${user.name}</span>
                <p>${user.status_message || ''}</p>
            </div>
        </div>
    `;
    userLi.onclick = () => loadChat(user.id, type);
    return userLi;
}


        // Helper function to group users by the first letter of their name
        function groupByFirstLetter(items, key) {
            return items.reduce((result, item) => {
                const firstLetter = item[key][0].toUpperCase();
                if (!result[firstLetter]) {
                    result[firstLetter] = [];
                }
                result[firstLetter].push(item);
                return result;
            }, {});
        }

        // Load chat for a selected Team or Admin
        function loadChat(id, type) {

    // Add the 'active' class to the chat box
    selectedId = id;
    document.getElementById("selectedId").value = id;
    recipientType = type;
    const badge = document.getElementById(`count_${id}`);
    if (badge) {
        badge.remove(); // Remove the badge
    }
    // Show the chat history box
    const chatHistoryBox = document.getElementById("chat-history-box");
    if (chatHistoryBox) {
        chatHistoryBox.classList.remove("d-none"); // Show the chat box by removing the 'd-none' class // Show the chat box by removing the 'd-none' class
    } else {
        console.error("Chat history box not found.");
    }
    const chatList = document.getElementById("chat-list");
    if (chatList) {
        chatList.classList.add("d-none"); // Show the chat box by removing the 'd-none' class // Show the chat box by removing the 'd-none' class
    } else {
        console.error("Chat history box not found.");
    }
    // Update chat header
    // Fetch and render messages
    fetch(`/api/teams/${type}/${id}/messages`)
        .then(response => response.json())
        .then(data => {
            if (data.messages) {
                const messagesDiv = document.getElementById("IC_W_Contacts_Body3");
                messagesDiv.innerHTML = ''; // Clear previous messages
                const chatName = document.getElementById("chatName");
                chatName.innerHTML = `Chat with ${data.name}`; // Clear previous name
                document.getElementById("second_profile").value = data.img; // Clear previous name
                data.messages.forEach(msg => {
                    addMessage(msg.message, msg.type,msg);
    document.getElementById("receiver_profile").value == msg.receiver.profile_picture;

                });
            }
        })
        .catch(error => console.error("Error loading messages:", error));
}
       function loadChatBox(id, type) {

            const chatBox = document.querySelector('.chatbox');
            if (chatBox) {
                chatBox.classList.add('active');
                chatBox.style.display = 'block';
                setTimeout(() => {
                    loadChat(id, type);
                    
                }, 1000);
            } else {
                console.error("Chat box element not found");
            }

            
        }

    // Add message and auto-scroll to the latest message
    function addMessage(msg, type, user) {
    const sender_id = Number(document.getElementById("sender_id").value);
    const selectedId = Number(document.getElementById("selectedId").value); // Assuming selectedId is stored in an element
    // Ensure the message is meant for the selected receiver
    if(user.user_type == 'admin'){

            if ((sender_id === Number(user.sender_id) && selectedId === Number(user.receiver_id)) ||
            (selectedId === Number(user.sender_id) && sender_id === Number(user.receiver_id))) {
                 const messageDiv = document.createElement("div");
            messageDiv.classList.add("d-flex", "mb-4");

            // Determine message alignment
            if (sender_id === Number(user.sender_id)) {
                messageDiv.classList.add("justify-content-end");
            } else {
                messageDiv.classList.add("justify-content-start");
            }
            // Create the container for the message content
            const messageContainer = document.createElement("div");
            if (sender_id === Number(user.sender_id)) {
                messageContainer.classList.add("msg_cotainer_send");
            } else {
                messageContainer.classList.add("msg_cotainer");
            }
            // Add the message text
            const messageText = document.createElement("div");
            messageText.textContent = msg;
            messageContainer.appendChild(messageText);
            const messageTime = document.createElement("span");
            messageTime.classList.add(type === "incoming" ? "msg_time" : "msg_time_send");
            if (user.created_at) {
                const messageDate = new Date(user.created_at); // Parse the time
                messageTime.textContent = messageDate.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true, // Display in 12-hour format
                });
            } else { // Fallback if time is not available
                messageTime.textContent = new Date().toLocaleTimeString(); // Format time as needed
            }
            messageContainer.appendChild(messageTime);

            // Append the message content to the main message div
            messageDiv.appendChild(messageContainer);

            // Create the image container
            const imgContainer = document.createElement("div");
            imgContainer.classList.add("img_cont_msg");

            const userImg = document.createElement("img");

            if (sender_id === Number(user.receiver_id) && Number(user.sender_id) === selectedId && user.user_status) {
                userImg.src = user && user.receiver && user.receiver.profile_picture
                ? user.receiver.profile_picture
                : "{{ asset('assets/images/dummyUser.jpg') }}";
            }else{
                userImg.src = user && user.sender && user.sender.profile_picture
                ? user.sender.profile_picture
                : "{{ asset('assets/images/dummyUser.jpg') }}"; // Default image if not available

            }
            userImg.classList.add("rounded-circle", "user_img_msg");
            // Append the image container based on sender ID
            if (sender_id === Number(user.sender_id)) {
                messageDiv.appendChild(imgContainer); // Place on the right
            } else {
                messageDiv.prepend(imgContainer); // Place on the left
            }
            imgContainer.appendChild(userImg);
            // Append the new message div to the messages container
            const messagesDiv = document.getElementById("IC_W_Contacts_Body3");
            messagesDiv.appendChild(messageDiv);
            // Scroll to the bottom to show the latest message
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    }else{
          const messageDiv = document.createElement("div");
            messageDiv.classList.add("d-flex", "mb-4");
            // Determine message alignment
            if (user.sender_id == selectedId) {
                messageDiv.classList.add("justify-content-end");
            } else {
                messageDiv.classList.add("justify-content-start");
            }
            // Create the container for the message content
            const messageContainer = document.createElement("div");
            if (user.sender_id == selectedId) {
                messageContainer.classList.add("msg_cotainer_send");
            } else {
                messageContainer.classList.add("msg_cotainer");
            }
            // Add the message text
            const messageText = document.createElement("div");
            messageText.textContent = msg;
            messageContainer.appendChild(messageText);
            const messageTime = document.createElement("span");
            messageTime.classList.add(type === "incoming" ? "msg_time" : "msg_time_send");
            if (user.created_at) {
                const messageDate = new Date(user.created_at); // Parse the time
                messageTime.textContent = messageDate.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true, // Display in 12-hour format
                });
            } else { // Fallback if time is not available
                messageTime.textContent = new Date().toLocaleTimeString(); // Format time as needed
            }
            messageContainer.appendChild(messageTime);
            // Append the message content to the main message div
            messageDiv.appendChild(messageContainer);
            // Create the image container
            const imgContainer = document.createElement("div");
            imgContainer.classList.add("img_cont_msg");
            const userImg = document.createElement("img");
            userImg.src = user && user.sender && user.sender.profile_picture
                ? user.sender.profile_picture
                : "{{ asset('assets/images/dummyUser.jpg') }}"; // Default image if not available
            userImg.classList.add("rounded-circle", "user_img_msg");
            // Append the image container based on sender ID
            if (user.sender_id == selectedId) {
                messageDiv.appendChild(imgContainer); // Place on the right
            } else {
                messageDiv.prepend(imgContainer); // Place on the left
            }
            imgContainer.appendChild(userImg);

            // Append the new message div to the messages container
            const messagesDiv = document.getElementById("IC_W_Contacts_Body3");
            messagesDiv.appendChild(messageDiv);
            // Scroll to the bottom to show the latest message
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
        // Create the outer message container
       
}




    // Send message logic
    function sendMessage() {
        const messageInput = document.getElementById("message");
        const message = messageInput.value.trim();
        const sender_id = document.getElementById("sender_id").value;
        const sender_profile = document.getElementById("sender_profile").value;
        const receiver_profile = document.getElementById("receiver_profile").value;
        if (message && selectedId) {
            // Emit message to server
            socket.emit("message", { sender_id: sender_id, receiver_id: selectedId, type: recipientType, text: message });
            // Add to UI immediately
            const user = {sender_id: sender_id, sender: {profile_picture: sender_profile }, receiver: {profile_picture: receiver_profile }, receiver_id: selectedId, type: recipientType,user_type: recipientType, text: message };
            if(recipientType == 'admin'){
                addMessage(message, "outgoing",user);

            }

            // Send message to backend
            fetch(`/api/teams/${recipientType}/${selectedId}/messages`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ message }),
            }).catch(error => console.error("Error sending message:", error));

            messageInput.value = ""; // Clear input
        } else {
            alert("Please select a recipient first!");
        }
    }

       // Initialize unread messages count
        let unreadCount = 0;

        // Function to update unread messages badge
        function updateUnreadCount() {
            const unreadBadge = document.getElementById('unread-count');
            unreadBadge.textContent = unreadCount;
            unreadBadge.style.display = unreadCount > 0 ? 'inline' : 'none'; // Hide badge if count is 0
        }
       function updateUnreadUserCount(receiver_id, unread_count,type) {
    // Locate the badge parent element
        
    const countBadgeParent = document.getElementById(`imgCount${type}${receiver_id}`);

    if (countBadgeParent) {
        // Remove existing badge if any
        ;
        const existingBadge = document.getElementById(`count_${receiver_id}`);
        if (existingBadge) {
            existingBadge.remove();
        }

        // Add a new badge only if unread_count > 0
        if (unread_count > 0) {
            const newBadge = document.createElement("span");
            newBadge.className = "badge badge-pill badge-danger unread-count";
            newBadge.id = `count_${receiver_id}`;
            newBadge.onclick = () => handleUnreadClick(receiver_id);
            newBadge.textContent = unread_count;

            // Append the badge after the image inside the parent container
            countBadgeParent.appendChild(newBadge);
        }

        // Move parent `<li>` to the top of the list
        const parentLi = countBadgeParent.closest('li'); // Assuming `countBadgeParent` is inside a `<li>`
        const listContainer = parentLi?.parentElement;

        if (listContainer && parentLi) {
            listContainer.prepend(parentLi); // Move the parent `<li>` to the top of the list
        }
    } else {
        console.error(`Parent element with id imgCount${receiver_id} not found`);
    }
}
document.querySelector('.notification_dropdown').addEventListener('mouseover', () => {
    const notificationBox = document.getElementById('notification-box');
    notificationBox.innerHTML = '<p>Loading...</p>'; // Show loading message
    const unreadCountSpan = document.getElementById('unread-count');
    fetch('/api/getUnreadNotifications')
        .then((response) => response.json())
        .then((data) => {
            console.log('datadd');
            console.log(data);
            if (data.success) {
                const unreadCount = data.messages.length;
                unreadCountSpan.textContent = unreadCount;
                notificationBox.innerHTML = ''; // Clear previous content
                if (data.messages.length > 0) {
                    data.messages.forEach((notification) => {
                        const notificationItem = document.createElement('div');
                        notificationItem.className = 'notification-item';
                        notificationItem.innerHTML = `
                            <h5>${notification.sender.name} ${notification.sender.last_name}</h5>
                            <p>${notification.message}</p>
                            <small>${new Date(notification.created_at).toLocaleString()}</small>
                        `;

                        // Add click handler to open chat
                        notificationItem.onclick = () => loadChatBox(notification.sender.id, 'admin');

                        notificationBox.appendChild(notificationItem);
                    });
                } else {
                    notificationBox.innerHTML = '<p>No new notifications</p>';
                }
            } else {
                notificationBox.innerHTML = '<p>Error loading notifications</p>';
            }
        })
        .catch((error) => {
            notificationBox.innerHTML = '<p>Error loading notifications</p>';
            console.error(error);
        });
});


// Example function for handling badge click
function handleUnreadClick(userId) {
    console.log(`Unread badge clicked for user ID: ${userId}`);
    // Add your logic for handling the unread badge click, such as loading chat
}


        // Listen for incoming messages
        socket.on("message", (data) => {
            data.user_type = data.type;
            const sender_profile = document.getElementById("sender_profile").value;
            data.sender = { profile_picture: sender_profile };
            const receiver_profile = document.getElementById("second_profile").value;
            data.receiver = { profile_picture: receiver_profile };
            if(data.type == 'admin'){
console.log('admin');
                    if (data.receiver_id === {{ auth()->user()->id }} && data.type === recipientType) {
                        updateUnreadUserCount(data.sender_id,1,'admin'); // Update the badge
                        data.user_status ='send';
                        addMessage(data.text, "incoming", data); // Display incoming message
                        unreadCount++;
                        updateUnreadCount(); // Update the badge
                    } else {
                        // Increment unread count for unrelated chats
                    }
            }else if(data.type == 'team'){
console.log('team');
                if (data.type === recipientType && data.receiver_id == selectedId) {
                        addMessage(data.text, "incoming", data); // Display incoming message
                        unreadCount++;
                        updateUnreadCount(); // Update the badge
                        updateUnreadUserCount(data.sender_id,1,'team'); // Update the badge
                    }

            }else {
                if (data.type === recipientType && data.receiver_id == selectedId) {
console.log('else a t');
                        addMessage(data.text, "incoming", data); // Display incoming message
                        unreadCount++;
                        updateUnreadCount(); // Update the badge
                        updateUnreadUserCount(data.sender_id,1,'user'); // Update the badge
                    }

            }
        });

        // Function to reset unread messages count
        function resetUnreadCount() {
            unreadCount = 0;
            updateUnreadCount();
        }

        // Call `resetUnreadCount()` whenever the user opens the chat
        document.getElementById("chat-history-box").addEventListener("click", resetUnreadCount);


        // Initialize the app
        renderLists();

        // Function to check if Enter is pressed
        function checkEnter(event) {
            if (event.key === "Enter" || event.keyCode === 13) {
                event.preventDefault();
                sendMessage();
            }
        }

    </script>
    <script>
        // Select the dropdown and notification box
const dropdown = document.querySelector('.notification_dropdown');
const notificationBox = document.querySelector('#notification-box');

// Show the notification box on hover
dropdown.addEventListener('mouseenter', () => {
    notificationBox.style.display = 'block';
});

// Hide the notification box when the mouse leaves both dropdown and notification box
dropdown.addEventListener('mouseleave', (event) => {
    if (!notificationBox.contains(event.relatedTarget)) {
        notificationBox.style.display = 'none';
    }
});

    </script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1.5,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 40,
                    },
                    1200: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                },
            });
            var swiper = new Swiper(".mySwiper1", {
                slidesPerView: 4,
                spaceBetween: 15,
                navigation: {
                    nextEl: "",
                    prevEl: "",
                },
                breakpoints: {
                    360: {
                        slidesPerView: 1.5,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2.5,
                        spaceBetween: 20,
                    },
                },
            });
        </script>

 @if(session('success'))
        <div class="alert alert-success alert-dismissible alert-alt solid fade show" role="alert" style="z-index: 999; position: absolute; top: 0; right: 0; left: 0; margin: 50px auto; width: 30%; font-size: medium;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <input type="hidden" id="successMsg" value="{{ session('success') }}">
        <a id="success" onclick="executeExample('customPositions')" >&nbsp;</a>
       
    @endif
       <script >
            function executeExample(t) {
                var msg = $('#successMsg').val();

                switch (t) {
                    case "customPositions":
                        return void Swal.fire({ position: "top-end", icon: "success", title: msg, showConfirmButton: !1, timer: 3000 });
                }
            }
            
       </script>
       <script>
           $(document).ready(function() {
                // Set a timeout to delay the execution of the code inside
                setTimeout(function() {
                        $('#success').click();
                    
                }, 800); // 3000 milliseconds = 3 seconds
            });
       </script>
<script>
    setTimeout(function() {
        $('.alert-success .btn-close').click();
    }, 5000);

</script>
        @yield('js')

    
    </body>
    <!--end body-->

</html>