@extends('layouts.app')

@section('title', 'Chat')

@section('content')
<style>
    .emoji-container {
        position: relative;
    }

    .emoji-container em-emoji-picker {
        position: absolute;
        
        left: 20px;
        z-index: 100;
    }
</style>


<div class="container mx-auto px-4 py-12">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/3 bg-blue-600 p-4">
            <h2 class="text-white text-xl mb-4">Messages</h2>
            <ul>
                @foreach($chats as $chatItem)
                    <li class="mb-2">
                        <a href="{{ route($userType . '.chats.show', $chatItem->id) }}" class="text-white block p-2 rounded hover:bg-blue-700">
                            {{ $userType === 'customer' ? $chatItem->worker->name : $chatItem->customer->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-2/3 p-4">
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/' . ($userType === 'customer' ? $chat->worker->image : $chat->customer->image)) }}" 
                     alt="Avatar" 
                     class="w-16 h-16 rounded-full mr-4 object-cover">
                <h3 class="text-xl font-bold">{{ $userType === 'customer' ? $chat->worker->name : $chat->customer->name }}</h3>
            </div>
            <div class="h-96 overflow-y-auto mb-4">
                @foreach($messages as $message)
                    <div class="mb-2 w-100 {{ $message->sender_id == Auth::id() && get_class(Auth::user()) == $message->sender_type ? 'justify-end' : 'justify-start' }}" style="display: flex;">
                        <p class="inline-block p-2 rounded-lg {{ $message->sender_id == Auth::id() && get_class(Auth::user()) == $message->sender_type ? 'bg-blue-200' : 'bg-gray-200' }}">  
                        {{ $message->message }}
                        @if(isset($message->image))
                            <img src="{{ asset('storage/' . $message->image) }}" width="100px" />
                        @endif
                        </p>
                    </div>
                @endforeach
            </div>
            <form method="POST" action="{{ route($userType . '.chats.storeMessage', $chat->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center bg-gray-100 rounded-full p-2">
                <div class="emoji-container" id="emoji-container">
                    <button type="button" id="emoji-button" class="px-2">
                        <svg class="h-6 w-6 text-slate-400"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="10" x2="9.01" y2="10" />  <line x1="15" y1="10" x2="15.01" y2="10" />  <path d="M9.5 15a3.5 3.5 0 0 0 5 0" /></svg>
                        </button>
                </div>
                    <input type="file" name="file" id="file-input" class="hidden">
                    <label for="file-input" class="px-2 cursor-pointer">
                    <svg class="h-6 w-6 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" /></svg>
                    </label>
                    <input type="text" id="message-input" name="message" placeholder="Type a message" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900">
                    <button type="submit" class=" text-white px-4 rounded-r-lg">
                    <svg class="h-5 w-5 text-green-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="22" y1="2" x2="11" y2="13" />  <polygon points="22 2 15 22 11 13 2 9 22 2" /></svg>
                    </button>
                    <button type="button" id="voice-button" class="ml-2 px-2">
                    <svg class="h-6 w-6 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="9" y="2" width="6" height="11" rx="3" />  <path d="M5 10a7 7 0 0 0 14 0" />  <line x1="8" y1="21" x2="16" y2="21" />  <line x1="12" y1="17" x2="12" y2="21" /></svg>                </div>
                <input type="hidden" name="userType" value="{{ $userType }}">
            </form>
        </div>
    </div>
</div>

<!-- <link rel="stylesheet" href="https://unpkg.com/emoji-mart/css/emoji-mart.css">
<script src="https://unpkg.com/emoji-mart/dist/emoji-mart.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
<script>
  const pickerOptions = { onEmojiSelect: console.log }
  const picker = new EmojiMart.Picker(pickerOptions)

  document.getElementById('emoji-button').addEventListener('click', () => {
    document.getElementById('emoji-container').appendChild(picker);
    console.log('emoji');

  })
</script>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    const picker = new EmojiMart.Picker({
        onSelect: function(emoji) {
            document.getElementById('message-input').value += emoji.native;
        },
        theme: 'light',
    });

    document.getElementById('emoji-button').addEventListener('click', function() {
        // Toggle emoji picker visibility
        picker.togglePickerVisibility();
        console.log("Emoji");
    });

    // Append the emoji picker to a container in your HTML
    document.body.appendChild(picker.element);
});

</script> -->
@endsection
