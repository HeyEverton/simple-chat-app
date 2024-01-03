<?php

namespace App\Services\Chat;

use App\Events\NewChatMessage;
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
        return $this->chatMessage->whereChatRoomId($roomId)
            ->with(['user'])
            ->orderBy('created_at', 'DESC')
            ->get();
    }


    public function createMessage(array $payload): ChatMessage
    {
        $loggedUser = auth()->user();
        $payload['user_id'] = $loggedUser->id;

        $message = $this->chatMessage->create($payload);

        broadcast(new NewChatMessage($message))->toOthers();
        return $message;
    }
}
