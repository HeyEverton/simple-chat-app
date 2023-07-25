<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\Chat\ChatRoomService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    private ChatRoomService $service;
    public function __construct(ChatRoomService $chat_room_service)
    {
        $this->service = $chat_room_service;
    }


    public function rooms(Request $request)
    {
        return $this->service->allRooms();
    }

    public function messages(Request $request, int $roomId)
    {
        return $this->service->allMessagesFromARoom($roomId);
    }

    public function newMessage(Request $request)
    {
        $payload = $request->all();
        return $this->service->createMessage($payload);
    }




}
