<!DOCTYPE html>
<head>
    <title>Notification Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('system/js/app.js') }}"></script>
    <script>
        var userId = 1;
        window.Echo.private(`notification-${userId}`)
            .notification((notification) => {
                console.log(notification.type);
            });
    </script>
</head>
<body>
    <h1>Notification Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>
</body>
