@extends('layouts.app')

@section('title', 'Chat')

@section('content')
<style>
    .emoji-container {
        position: relative;
    }

    .emoji-container em-emoji-picker {
        position: absolute;
        bottom: 0px; 
        left: 20px;
        z-index: 100;
    }

    .message-timestamp {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
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
            <div class="h-96 overflow-y-auto mb-4" id="chat-messages">
                @foreach($messages as $message)
                    <div class="mb-2 {{ $message->sender_id == Auth::id() && get_class(Auth::user()) == $message->sender_type ? 'justify-end' : 'justify-start' }}" style="display: flex;">
                        <div class="inline-block p-2 rounded-lg {{ $message->sender_id == Auth::id() && get_class(Auth::user()) == $message->sender_type ? 'bg-blue-200' : 'bg-gray-200' }}">
                            <p>{{ $message->message }}</p>
                            @if(isset($message->file_path))
                                <img src="{{ asset('storage/' . $message->file_path) }}" width="100px" class="block mt-2"/>
                            @endif
                            @if(isset($message->audio))
                                <audio controls src="{{ asset('storage/' . $message->audio) }}" class="block mt-2"></audio>
                            @endif
                            <span class="message-timestamp">{{ $message->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <form method="POST" action="{{ route($userType . '.chats.storeMessage', $chat->id) }}" enctype="multipart/form-data" id="chat-form">
                @csrf
                <div id="image-preview" class="mb-4"></div>
                <div class="emoji-container mb-4" id="emoji-container"></div>
                <div class="flex items-center bg-gray-100 rounded-full p-2">
                    <button type="button" id="emoji-button" class="px-2">
                        <svg class="h-6 w-6 text-slate-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>  
                            <circle cx="12" cy="12" r="9" />  
                            <line x1="9" y1="10" x2="9.01" y2="10" />  
                            <line x1="15" y1="10" x2="15.01" y2="10" />  
                            <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
                        </svg>
                    </button>
                    <input type="file" name="file" id="file-input" class="hidden" accept="image/*">
                    <label for="file-input" class="px-2 cursor-pointer">
                        <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" />
                        </svg>
                    </label>
                    <input type="text" id="message-input" name="message" placeholder="Type a message" class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900">
                    <input type="hidden" name="audio" id="audio-input">
                    <button type="submit" class="text-white px-4 rounded-r-lg">
                        <svg class="h-5 w-5 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13" />  
                            <polygon points="22 2 15 22 11 13 2 9 22 2" />
                        </svg>
                    </button>
                    <button type="button" id="voice-button" class="ml-2 px-2">
                        <svg class="h-6 w-6 text-slate-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>  
                            <rect x="9" y="2" width="6" height="11" rx="3" />  
                            <path d="M5 10a7 7 0 0 0 14 0" />  
                            <line x1="8" y1="21" x2="16" y2="21" />  
                            <line x1="12" y1="17" x2="12" y2="21" />
                        </svg>
                    </button>
                </div>
                <audio id="audio-preview" class="hidden" controls></audio>
                <input type="hidden" name="userType" value="{{ $userType }}">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>
<script>
    const pickerOptions = { onEmojiSelect: addEmoji };
    const picker = new EmojiMart.Picker(pickerOptions);

    document.getElementById('emoji-button').addEventListener('click', () => {
        const emojiContainer = document.getElementById('emoji-container');
        if (emojiContainer.contains(picker)) {
            emojiContainer.removeChild(picker);
        } else {
            emojiContainer.appendChild(picker);
        }
    });

    function addEmoji(emoji) {
        const messageInput = document.getElementById('message-input');
        messageInput.value += emoji.native;
    }

    document.getElementById('file-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.innerHTML = `<img src="${e.target.result}" width="100px" class="inline-block rounded-lg">`;
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '';
        }
    });

    // Voice Recording
    let mediaRecorder;
    let audioChunks = [];

    document.getElementById('voice-button').addEventListener('click', async () => {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            return;
        }

        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = event => {
            audioChunks.push(event.data);
        };

        mediaRecorder.onstop = () => {
            const audioBlob = new Blob(audioChunks, { type: 'audio/mpeg-3' });
            audioChunks = [];
            const audioUrl = URL.createObjectURL(audioBlob);
            const audioPreview = document.getElementById('audio-preview');
            audioPreview.src = audioUrl;
            audioPreview.classList.remove('hidden');
            audioPreview.classList.add('inline-block');

            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('audio-input').value = event.target.result;
            };
            reader.readAsDataURL(audioBlob);
        };

        mediaRecorder.start();
    });
</script>
@endsection
