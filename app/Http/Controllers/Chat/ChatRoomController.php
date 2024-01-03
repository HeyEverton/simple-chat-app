<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Services\Chat\ChatRoomService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    private ChatRoomService $service;
    public function __construct(ChatRoomService $chat_room_service)
    {
        $this->service = $chat_room_service;
        $this->middleware('auth:sanctum');
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function rooms(Request $request): Collection
    {
        return $this->service->allRooms();
    }

    /**
     * @param Request $request
     * @param int $roomId
     * @return Collection
     */
    public function messages(Request $request, int $roomId): Collection
    {
        return $this->service->allMessagesFromARoom($roomId);
    }

    public function newMessage(Request $request)
    {
        $payload = $request->all();
        return $this->service->createMessage($payload);
    }




}
