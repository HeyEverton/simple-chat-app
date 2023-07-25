<?php

namespace App\Services\Chat;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomService
{

    public function __construct(
        private ChatRoom $chatRoom,
        private ChatMessage $chatMessage,
        private User $user
    ) {
    }

    public function allRooms()
    {
        return $this->chatRoom->all();
    }

    /**
     * @param int $roomId
     *
     * @return Collection
     */
    public function allMessagesFromARoom(int $roomId): Collection
    {
        // return $this->chatMessage->where('chat_room_id', '=', $roomId);
        // test if this under works
        return $this->chatMessage->whereChatRoomId($roomId)
            ->with(['user'])
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function createMessage(array $payload): ChatMessage
    {
        $loggedUser = auth()->user();
        $payload['user_id'] = $loggedUser;

        return $this->chatMessage->create($payload);
    }
}
