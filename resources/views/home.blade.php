<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<x-app-layout>
<body>
    <a href="{{route('activities.index')}}" class=" dark:text-gray-200 ">Activity</a>
    <br></br>
    <a href="{{route('room.index')}}" class=" dark:text-gray-200 ">Room</a>
    <br></br>
    <a href="{{route('contact.index')}}" class=" dark:text-gray-200 ">Contact</a>
    <br></br>
    <a href="{{route('booking.index')}}" class=" dark:text-gray-200 ">Booking</a>
</body>
</x-app-layout>
</html>