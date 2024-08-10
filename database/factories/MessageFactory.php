<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // On sélectionne de manière tous les ids d'utilisateur
        $userIds = \App\Models\User::pluck("id")->toArray();

        // On décide de manière aléatoire si le message est un message direct ou un message de groupte
        $isGroupMessage = fake()->boolean(50);

        // On sélectionne un user aléatoirement
        $senderId = fake()->randomElement($userIds);

        // On initialise le receiverId et le groupId
        $receiverId = null;
        $groupId = null;

        // si c'est un message de groupe
        if ($isGroupMessage) {
            // On s'assure que le groupe existe dans la BDD
            $groupIds = \App\Models\Group::pluck("id")->toArray();

            if (empty($groupIds)) {
                throw new \Exception("Aucun groupe trouvé dans la base de données.");
            }
            // On prend au hasard un groupe
            $groupId = fake()->randomElement($groupIds);

            // Sélectionnez un groupe aléatoirement
            $group = \App\Models\Group::find($groupId);

            // On récupère un utilisateur du groupe aléatoirement
            $senderId = fake()->randomElement($group->users->pluck('id')->toArray());
        } else {
            // C'est un message direct qu'on envoie
            // On sélectionne un receiver qui est différent du sender
            $receiverId = fake()->randomElement(array_diff($userIds, [$senderId]));
        }

        // $senderId = fake()->randomElement([0, 1]);

        // if ($senderId === 0) {
        //     $senderId = fake()->randomElement(\App\Models\User::where("id", "!=", 1)->pluck("id")->toArray());
        //     $receiverId = 1;
        // } else {
        //     $receiverId = fake()->randomElement(\App\Models\User::pluck("id")->toArray());
        // }

        // $groupId = null;

        // if (fake()->boolean(50)) {
        //     $groupId = fake()->randomElement(\App\Models\Group::pluck("id")->toArray());

        //     $group = \App\Models\Group::find($groupId);

        //     $senderId = fake()->randomElement($group->users->pluck("id")->toArray());
        //     $receiverId = null;
        // }

        // Trouver et créer une conversation directe entre the sender et the receiver
        $conversationId = null;
        // if (!$isGroupMessage) {
        //     $conversationId = \App\Models\Conversation::firstOrCreate(
        //         [
        //             "user_id1" => min($senderId, $receiverId),
        //             "user_id2" => max($senderId, $receiverId)
        //         ],

        //         [
        //             "last_message_id" => null
        //         ]
        //     );

        // }

        return [
            "message" => fake()->realText(),
            "sender_id" => $senderId,
            "receiver_id" => $receiverId,
            "group_id" => $groupId,
            "conversation_id" => $conversationId
        ];
    }
}
