<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class CreateItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = array(
            array(
                'item_name' => 'Guitar',
                'location' => 'Storage A',
                'description' => 'A musical instrument having a flat-backed round body, a long fretted neck, and usually six strings, played by plucking or strumming with the fingers or a plectrum.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Basketball',
                'location' => 'Storage B',
                'description' => 'A game played between two teams of five players in which goals are scored by throwing a ball through a netted hoop fixed above each end of the court.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Shuttlecock',
                'location' => 'Storage B',
                'description' => 'A light, cone-shaped object that is hit back and forth over a net in badminton and battledore, typically consisting of a cork that has been stripped of its feathers and attached to a small piece of cork or plastic.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Vollyball',
                'location' => 'Storage B',
                'description' => 'A game for two teams in which the object is to keep a large ball in motion, from side to side over a high net, by striking it with the hands before it touches the ground.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Table Tennis',
                'location' => 'Storage B',
                'description' => 'A game in which two or four players hit a small ball back and forth to each other with a bat, the object being to score 11 points before the opponent.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Bass',
                'location' => 'Storage A',
                'description' => 'A low-pitched instrument, the largest and lowest member of the violin family.',
                'item_status' => 'Unavailable',
            ),
            array(
                'item_name' => 'Bass',
                'location' => 'Storage A',
                'description' => 'A low-pitched instrument, the largest and lowest member of the violin family.',
                'item_status' => 'Unavailable',
            ),
            array(
                'item_name' => 'Tagading',
                'location' => 'Storage A',
                'description' => 'A traditional musical instrument from Indonesia.',
                'item_status' => 'Unavailable',
            ),
            array(
                'item_name' => 'Camera',
                'location' => 'Storage A',
                'description' => 'A device for recording visual images in the form of photographs, film, or video signals.',
                'item_status' => 'Available',
            ),
            array(
                'item_name' => 'Speaker',
                'location' => 'Storage A',
                'description' => 'A device that converts electrical signals into sound, typically as part of a public address system or stereo system.',
                'item_status' => 'Available',
            ),
        );

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
