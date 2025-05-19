@extends('leagues.layouts.master')

@section('content')
@php
  $slug = session('slug');
  if (!$slug) {
      $slug = 'url';
  }
@endphp
<!-- Dashboard page -->
<div class="content-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm ">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white">League Message Board</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="messageboard-wrapper" id="messageContainer" style="overflow-x: scroll;height: 400px;">
                            <div class="row  px-2 py-4">
                                <div class="col-8">
                                    <div class="user-chat-wrapper chat-leftside">
                                        <div class="user-image">
                                            <img width="40px" src="https://recstep.com/pictures/abc.png">
                                        </div>
                                        <div class="user-chat">
                                            <p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-2 py-4">
                                <div class="col-8">
                                    <div class="user-chat-wrapper chat-leftside">
                                        <div class="user-image">
                                            <img width="40px" src="https://recstep.com/pictures/abc.png">
                                        </div>
                                        <div class="user-chat">
                                            <p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-2 py-4">
                                <div class="col-lg-4 col-md-12 col-sm-12 ">

                                </div>
                                <div class="col-8">
                                    <div class="user-chat-wrapper chat-rightside">

                                        <div class="user-chat">
                                            <p>Oh heck yes, I’m in. Thinking of hitting up that new arcade spot. They’ve got that retro Pac-Man machine, right?</p>
                                        </div>
                                        <div class="user-image">
                                            <img width="40px" src="https://recstep.com/pictures/cde.png">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <form id="messageFormUnique" style="position: absolute;
    width: 100%;
    bottom: 1%;
    padding: 5px 10px;border:1px solid lightgray;border-bottom: none;
}">
                            @csrf
                            <div class="input-group ">

                                <input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Type message here.................">
                                <button class="btn btn-primary rounded" type="submit">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="right-sidebar">
                    <div class="shadow-sm border rounded mb-3 ">
                        <div class="card-header bg-primary rounded-top">
                            <div class="card-title">
                                <h4 class="text-white mb-0">Recent/Upcoming Game</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-3 border-top text-center">
                                <button class="btn btn-sm btn-outline-primary">View Full Schedule</button>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm border rounded mb-3 ">
                        <div class="card-header bg-primary rounded-top">
                            <div class="card-title">
                                <h4 class="text-white mb-0">Apr 23, 2025 08:00 AM</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-3">
                                <p class="mb-0">The Blue Tigers</p>
                            </div>
                            <div class="p-3 bg-primary-light">
                                <p class="mb-0">Mumbai Indian</p>
                            </div>
                            <div class="p-3">
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Boston Park</button>
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Regular Season</button>
                                <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> First Division</button>
                            </div>
                            <div class="p-3 border-top text-center">
                                <button class="btn btn-sm btn-outline-primary">View Game Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="getRoute" value="{{route('league.message.index',$slug)}}">
        <input type="hidden" id="postRoute" value="{{route('league.message.store',$slug)}}">
    </div> 
</div>
<style type="text/css">
    .messageboard-wrapper {
        margin-bottom: 50px;
    }
    .messageboard-wrapper .user-image {
        padding: 0 10px;
    }
    .messageboard-wrapper .user-chat-wrapper.chat-leftside {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: flex-start;
        flex-direction: row;
    }
    .messageboard-wrapper .user-image img {
        width: 50px;
        border-radius: 50%;
    }
    .messageboard-wrapper .user-chat-wrapper.chat-leftside .user-chat {
        padding: 10px;
        background: #ffffff;
        border-radius: 0 6px 6px 6px;
        box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1);
    }
    .messageboard-wrapper .user-chat-wrapper.chat-rightside {
        display: flex;        ;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: flex-start;
        flex-direction: row;
        float: right;
    }
    .messageboard-wrapper .user-chat-wrapper.chat-rightside .user-chat {
        padding: 10px;
        background: #115A83;
        border-radius: 6px 0px 6px 6px;
        box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1);
        color: #ffffff;
    }
    .messageboard-wrapper form#messageFormUnique {
        box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1);
        padding: 15px;
        background: #ffffff;
        border-radius: 0px 0px 10px 10px;
    }
</style>

@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const messageForm = document.getElementById('messageFormUnique');
    const messageInput = document.getElementById('messageInputUnique');
    const messageContainer = document.getElementById('messageContainer');
    
    // Load messages when page loads
    loadMessages();
    
    // Set up periodic refresh (every 5 seconds)
    setInterval(loadMessages, 100000);
    
    // Handle form submission
    messageForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const message = messageInput.value.trim();
        if (message === '') return;
        
        sendMessage(message);
        messageInput.value = '';
    });
    
    // Function to load messages
    function loadMessages() {
        const getRoute = $('#getRoute').val();
        fetch(getRoute, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderMessages(data.messages);
            }
        })
        .catch(error => {
            console.error('Error loading messages:', error);
        });
    }
    
    // Function to send a message
    function sendMessage(message) {
        const formData = new FormData();
        formData.append('message', message);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        const postRoute = $('#postRoute').val();
        fetch(postRoute, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadMessages(); // Refresh messages after sending
            } else {
                alert('Failed to send message: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error sending message:', error);
            alert('An error occurred while sending the message');
        });
    }
    
    // Function to render messages
    function renderMessages(messages) {
        messageContainer.innerHTML = '';
        
        messages.forEach(message => {
            const isCurrentUser = message.is_current_user; // You'll need to set this in your backend
            
            const messageDiv = document.createElement('div');
            messageDiv.className = `row px-2 py-4 ${isCurrentUser ? 'justify-content-end ' : ''}`;
            
            messageDiv.innerHTML = `
                <div class="col-8">
                    <div class="user-chat-wrapper ${isCurrentUser ? 'chat-rightside' : 'chat-leftside'}">
                        ${!isCurrentUser ? `
                        <div class="user-image">
                            <img width="40px" src="${message.user_avatar || 'https://recstep.com/pictures/default-avatar.png'}">
                        </div>
                        ` : ''}
                        
                        <div class="user-chat">
                            <p>${message.content}</p>
                            <small class="text-muted">${formatTime(message.created_at)}</small>
                        </div>
                        
                        ${isCurrentUser ? `
                        <div class="user-image">
                            <img width="40px" src="${message.user_avatar || 'https://recstep.com/pictures/default-avatar.png'}">
                        </div>
                        ` : ''}
                    </div>
                </div>
            `;
            
            messageContainer.appendChild(messageDiv);
        });
        
        // Scroll to bottom
        messageContainer.scrollTop = messageContainer.scrollHeight;
    }
    
    // Helper function to format time
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }
});
</script>
@endsection