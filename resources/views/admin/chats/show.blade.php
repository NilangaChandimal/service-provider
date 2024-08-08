@extends('layouts.app')

@section('content')
    <h1>Chat between {{ $chat->worker->name }} and {{ $chat->customer->name }}</h1>

    <ul style="list-style-type: none; padding: 0;">
        @foreach ($chat->messages as $message)
            <li style="margin-bottom: 20px; display: flex; {{ $message->sender_type == 'App\Models\Worker' ? 'justify-content: flex-start;' : 'justify-content: flex-end;' }}">
                <div style="max-width: 60%; {{ $message->sender_type == 'App\Models\Worker' ? 'text-align: left;' : 'text-align: right;' }}">
                    
                    <!-- Display the sender's name -->
                    <strong>{{ $message->sender->name }}</strong>
                    
                    <!-- Display the image if the image path is present -->
                    @if ($message->image && Str::endsWith($message->image, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ asset('storage/' . $message->image) }}" alt="Image" style="max-width: 200px; height: auto; border-radius: 10px; margin-top: 5px;">
                    @endif

                    <!-- Display the text message if it's present -->
                    @if ($message->message)
                        <p style="background-color: {{ $message->sender_type == 'App\Models\Worker' ? '#d1e7dd' : '#f8d7da' }}; padding: 10px; border-radius: 10px; display: inline-block; margin-top: 5px;">
                            {{ $message->message }}
                        </p>
                    @endif

                    <!-- Display the message send time and date -->
                    <small style="color: #6c757d; display: block; margin-top: 5px;">
                        {{ $message->created_at->format('M d, Y h:i A') }}
                    </small>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
