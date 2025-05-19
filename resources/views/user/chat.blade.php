<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <h1>Real-Time Chat</h1>
    <div id="messages"></div>
    <form id="chat-form">
        <input type="text" id="message" placeholder="Type a message">
        <button type="submit">Send</button>
    </form>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            encrypted: true
        });

        const channel = pusher.subscribe('chat-channel');
        channel.bind('App\\Events\\MessageSent', function(data) {
            const messages = document.getElementById('messages');
            const message = document.createElement('p');
            message.textContent = data.message;
            messages.appendChild(message);
        });

        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const message = document.getElementById('message').value;

            fetch("{{ route('send-message') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ message })
            });
        });
    </script>
</body>
</html>
