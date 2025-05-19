
<!-- <div id="overiewChart"></div> -->
<!-- <div id="marketChart"></div> -->
<!-- <div id="chartBar"></div> -->
<!-- <div id="lineBar"></div> -->
<!-- <div id="chartTimeline"></div> -->
<!-- <div id="pieChart"></div> -->
<div id="marketChart2" style="display: none;"></div>
<!-- <div id="redial1"></div> -->

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
        <p>Copyright © 2025 - All Right Reserved By RECSTEP</p>
    </div>
</div>
</div>
<input type="hidden" id="sender_id" value="{{auth()->user()->id}}">
<input type="hidden" id="selectedId" value="">

<input type="hidden" id="sender_profile" value="{{asset(auth()->user()->profile_picture)}}">
@if(auth()->user()->receiver)
@if(auth()->user()->receiver->sender)
<input type="hidden" id="receiver_profile" value="{{asset(auth()->user()->receiver->sender->profile_picture)}}">
@else
<input type="hidden" id="receiver_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
@endif
@else
<input type="hidden" id="receiver_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
@endif
<input type="hidden" id="second_profile" value="{{ asset('assets/images/dummyUser.jpg') }}">
<!-- Required vendors -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<!-- Apex Chart -->
<script src="{{asset('assets/vendor/apexchart/apexchart.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/apex-init.js')}}"></script>
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
<script src="js/demo.js"></script>
<script src="js/styleSwitcher.js"></script>
<script >
$(document).ready(function () {
    $(document).on("click", "#navbarToggler", function () {
            $(".showNavBar").collapse("toggle");
    });
});


</script>
<script src="https://cdn.socket.io/4.5.1/socket.io.min.js"></script>

<script>
    const socket = io("https://recstep.com:3001", {
        path: "/socket.io",
        transports: ["websocket", "polling"],
    });


        // socket.emit('user-online', { userId: 5 });

        // socket.on('online-users', (onlineUsers) => {
        //     console.log('Online users:', onlineUsers);
        //     updateOnlineUserList(onlineUsers);
        // });

        // setTimeout(() => {
        //     socket.emit('get-online-users');
        //     console.log('sa');
        // }, 15000);

        // function updateOnlineUserList(users) {
        //     const userListDiv = document.getElementById('online-users-list');
        //     userListDiv.innerHTML = ''; // Clear existing list

        //     users.forEach(userId => {
        //         const userElement = document.createElement('div');
        //         userElement.textContent = `User ID: ${userId} is online`;
        //         userListDiv.appendChild(userElement);
        //     });
        // }


    const teamListDiv = document.getElementById("team-list");
    const adminListDiv = document.getElementById("admin-list");
    const messagesDiv = document.getElementById("messages");
    let selectedId = null;
        let recipientType = null; // 'team' or 'admin'

        function renderLists() {
    const teamListDiv = document.getElementById('team-list'); // Replace with your team's container element ID
    teamListDiv.innerHTML = ''; // Clear existing list
    const notificationBox = document.getElementById('timeline'); // Replace with your actual notification container ID
    const unreadCountSpan = document.getElementById('unread-count');

    // Show loading message
    // notificationBox.innerHTML = `
    //     <li>
    //         <div class="timeline-panel">
    //             <p>Loading...</p>
    //         </div>
    //     </li>
    // `;

    // Fetch Admins and Teams
    Promise.all([
        fetch(`/api/getadmins`).then((response) => response.json()),
        fetch(`/api/getteams`).then((response) => response.json()),
    ])
    .then(([adminsData, teamsData]) => {
            // Process Admins
        if (adminsData.success) {
                // Sort admins by `last_activity` or similar property (newest first)


            const sortedAdmins = adminsData.admins.sort(
                (a, b) => new Date(b.last_activity) - new Date(a.last_activity)
                );

                // Append sorted admins to the list
            sortedAdmins.forEach((admin) => {
                const adminLi = createUserLi(admin, 'admin');
                teamListDiv.appendChild(adminLi);
            });
            const data = adminsData;
            const unreadCount = data.messages.length;
            if(data.messages.length == 0){
                const unreadBadge = document.getElementById('unread-count');
                unreadBadge.textContent = unreadCount;
                unreadBadge.style.display = unreadCount > 0 ? 'inline' : 'none';
            }else{
                unreadCountSpan.textContent = unreadCount;

            }
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
            console.log('hasTeamMessage');
            console.log(teamsData);
            if (teamsData.hasTeamMessage) {
                console.log('teamsData');
                teamsData.hasTeamMessage.forEach((message) => {
                    console.log('updatefun');
                    updateUnreadUserCount(message, 1, 'team', message);
                });
            }
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
                <span class="online_icon ${user.is_online == 1 ? 'online' : 'offline'}"></span>
                ${type == 'admin' && user.unread_messages_count > 0 
                ? `<span class="badge badge-pill badge-danger unread-count" id="count_${user.id}" onclick="handleUnreadClick(${user.id})">${user.unread_messages_count}</span>` 
                : '' }
    ${type == 'team' && user.unread_team_messages_count > 0 
    ? `<span class="badge badge-pill badge-danger unread-count" id="countTeam_${user.id}" onclick="handleUnreadClick(${user.id})">${user.unread_team_messages_count}</span>` 
    : '' }

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
                    if(msg.sender){
                        addMessage(msg.message, msg.type,msg);
                        if(msg.receiver){
                            document.getElementById("receiver_profile").value == msg.receiver.profile_picture;

                        }
                    }

                });
            }
        })
    .catch(error => console.error("Error loading messages:", error));
}
function loadChatBox(id, type) {
    console.log(id);
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
      console.log(user.sender_id);
      console.log(user);
      console.log(sender_id);
      console.log('sender_id');
      if (user.sender_id == sender_id) {
        messageDiv.classList.add("justify-content-end");
    } else {
        messageDiv.classList.add("justify-content-start");
    }
            // Create the container for the message content
    const messageContainer = document.createElement("div");
    if (user.sender_id == sender_id) {
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
            const imgContainer = document.createElement("div");
            imgContainer.classList.add("img_cont_msg");
            const userImg = document.createElement("img");
            userImg.src = user && user.sender && user.sender.profile_picture
            ? user.sender.profile_picture
                : "{{ asset('assets/images/dummyUser.jpg') }}"; // Default image if not available
                userImg.classList.add("rounded-circle", "user_img_msg");
            // Append the image container based on sender ID
                if (user.sender_id == sender_id) {
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
        function updateUnreadUserCount(receiver_id, unread_count, type,selectedId) {
    let countBadgeParent; // Declare it outside so it's accessible

    // Locate the badge parent element
    if (type == 'team') {
        countBadgeParent = document.getElementById(`imgCountteam${selectedId}`);
        console.log('if');
    } else {
        countBadgeParent = document.getElementById(`imgCount${type}${receiver_id}`);
        console.log('else');
    }

    console.log('countBadgeParent');
    console.log(`imgCount${type}${selectedId}`);
    console.log(countBadgeParent);
    const parentLi = countBadgeParent.closest('li'); 
    const listContainer = parentLi?.parentElement;

    if (listContainer && parentLi) {
            listContainer.prepend(parentLi); // Move the parent `<li>` to the top of the list
        }
        if (countBadgeParent) {
        // Remove existing badge if any
            let existingBadge;
            if (type == 'team') {
                existingBadge = document.getElementById(`count_${selectedId}`);
            } else {
                existingBadge = document.getElementById(`count_${receiver_id}`);
            }

            if (existingBadge) {
                existingBadge.remove();
            }

        // Add a new badge only if unread_count > 0
            if (unread_count > 0) {
                const newBadge = document.createElement("span");
                newBadge.className = "badge badge-pill badge-danger unread-count";

                if (type == 'team') {
                    newBadge.id = `count_${selectedId}`;
                    newBadge.onclick = () => handleUnreadClick(selectedId);
                } else {
                    newBadge.id = `count_${receiver_id}`;
                    newBadge.onclick = () => handleUnreadClick(receiver_id);
                }

                newBadge.textContent = unread_count;

            // Append the badge after the image inside the parent container
                countBadgeParent.appendChild(newBadge);
            }

        // Move parent `<li>` to the top of the list

        } else {
            console.error(`Parent element with id imgCount${type}${receiver_id} not found`);
        }
    }

    document.querySelector('.notification_dropdown').addEventListener('mouseenter', () => {
    const notificationBox = document.getElementById('timeline'); // Replace with your actual notification container ID
    const unreadCountSpan = document.getElementById('unread-count');

    // Show loading message
    // notificationBox.innerHTML = `
    //     <li>
    //         <div class="timeline-panel">
    //             <p>Loading...</p>
    //         </div>
    //     </li>
    // `;

    fetch('/api/getUnreadNotifications')
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            const unreadCount = data.messages.length;
            unreadCountSpan.textContent = unreadCount;

                // Clear the previous content
            notificationBox.innerHTML = '';

            if (unreadCount > 0) {
                data.messages.forEach((notification) => {
                    const formattedDate = new Intl.DateTimeFormat('en-US', {
                        month: 'long',
                        day: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true,
                    }).format(new Date(notification.created_at));
                    const notificationItem = document.createElement('li');
                    notificationItem.innerHTML = `
                            <div class="timeline-panel">
                                <div class="media me-2">
                                    ${
                                        notification.sender.profile_picture
                                        ? `<img alt="image" width="50" src="${notification.sender.profile_picture}">`
                                        : '<img alt="image" width="50" src="https://recstep.com/assets/images/dummyUser.jpg">'
                                    }
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-1">${notification.sender.name || 'Unknown'} ${notification.sender.last_name || ''}</h6>
                                    <small class="d-block">${formattedDate}</small>
                                </div>
                            </div>
                                    `;

                        // Add click handler to open chat
                                    if(notification.user_type == 'team'){

                                        notificationItem.addEventListener('click', () =>
                                            loadChatBox(notification.receiver_id, notification.user_type)
                                            );
                                    }else{
                                        notificationItem.addEventListener('click', () =>
                                            loadChatBox(notification.sender.id, notification.user_type)
                                            );
                                    }

                        // Append to the notification list
                                    notificationBox.appendChild(notificationItem);
                                });
            } else {
                    // notificationBox.innerHTML = `
                    //     <li>
                    //         <div class="timeline-panel">
                    //             <p>No new notifications</p>
                    //         </div>
                    //     </li>
                    // `;
            }
        } else {
            notificationBox.innerHTML = `
                    <li>
                        <div class="timeline-panel">
                            <p>Error loading notifications</p>
                        </div>
                    </li>
            `;
        }
    })
    .catch((error) => {
        notificationBox.innerHTML = `
                <li>
                    <div class="timeline-panel">
                        <p>Error loading notifications</p>
                    </div>
                </li>
        `;
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
    console.log(data);
    console.log('data');
    if(data.type == 'admin'){
        console.log('admin');
        const senderLi = document.getElementById(`imgCountadmin${selectedId}`);
        console.log(senderLi);
        if (senderLi) {
                const senderListItem = senderLi.closest("li"); // Get the closest <li> element
                if (senderListItem) {
                    const parentList = senderListItem.parentElement; // Get the parent <ul> or <div> containing the list
                    if (parentList) {
                        parentList.prepend(senderListItem); // Move the selected <li> to the top
                    }
                }
            }

            unreadCount++;
                        updateUnreadCount(); // Update the badge
                        updateUnreadUserCount(data.sender_id,unreadCount,'admin',selectedId); // Update the badge
                        if (data.receiver_id === {{ auth()->user()->id }} && data.type === recipientType) {
                            data.user_status ='send';
                        addMessage(data.text, "incoming", data); // Display incoming message
                    } else {
                        // Increment unread count for unrelated chats
                    }

                    
                }else if(data.type == 'team'){
                    console.log('team type');
                    console.log(data);
                    console.log('team');
                    const senderLi = document.getElementById(`imgCountteam${selectedId}`);
                    console.log(senderLi);
                    if (senderLi) {
                const senderListItem = senderLi.closest("li"); // Get the closest <li> element
                if (senderListItem) {
                    const parentList = senderListItem.parentElement; // Get the parent <ul> or <div> containing the list
                    if (parentList) {
                        parentList.prepend(senderListItem); // Move the selected <li> to the top
                    }
                }
            }
                        updateUnreadCount(); // Update the badge
                        unreadCount = 1;
                        if (data.type === recipientType && data.receiver_id == selectedId) {
                            unreadCount = 0;

    // Send an AJAX request to fetch the sender's profile image
                            $.ajax({
    url: `/getUserprofile/${data.sender_id}`, // Replace with your route to fetch user profile
    type: 'GET',
    success: function (response) {
        const senderImage = response.profile_picture; // Extract profile picture
        data.sender = { profile_picture: senderImage }; // Attach profile picture to sender
        addMessage(data.text, "incoming", data); // Display incoming message
    },
    error: function (error) {
        console.error("Failed to fetch user profile:", error); // Log the error
    }
});
                        }
        updateUnreadUserCount(data.sender_id,unreadCount,'team',data.receiver_id); // Update the badge

    }else {
        if (data.type === recipientType && data.receiver_id == selectedId) {
            console.log('else a t');
                        addMessage(data.text, "incoming", data); // Display incoming message
                        unreadCount = 1;
                        updateUnreadCount(); // Update the badge
                        updateUnreadUserCount(data.sender_id,unreadCount,'user',data.receiver_id); // Update the badge
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
    const timeline = document.querySelector('#timeline');

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
    notificationBox.addEventListener('mouseleave', (event) => {
        notificationBox.style.display = 'none';    
    });
    timeline.addEventListener('mouseleave', (event) => {
        notificationBox.style.display = 'none';    
    });

</script>
<script>
    function filterUsers() {
        const searchInput = document.getElementById('searchUser').value.toLowerCase(); // Get the search query
        const userItems = document.querySelectorAll('#team-list li'); // Get all user list items

        userItems.forEach((item) => {
            const userName = item.querySelector('.user_info span').textContent.toLowerCase(); // Get user name
            if (userName.includes(searchInput)) {
                item.style.display = ''; // Show the user if the name matches the query
            } else {
                item.style.display = 'none'; // Hide the user if the name doesn't match
            }
        });
    }
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
<script>
    $(document).ready(function () {
    
        $(".dropdown-menu").removeClass("show");
        $(".dropdown-menu").find(".dropdown-menu").removeClass("show");
    $(".dropdown-menu").mouseleave(function () {
        $(this).removeClass("show");
        $(this).find(".dropdown-menu").removeClass("show");
    });
    $(".dropdown").mouseleave(function () {
        $(this).removeClass("show");
        $(this).find(".dropdown-menu").removeClass("show");
    });
});

</script>
@yield('js')


</body>
<!--end body-->

</html>