<?php

namespace Database\Seeders;

use App\Models\AnonymousStory;
use Illuminate\Database\Seeder;

class AnonymousStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            'Aku sempat menyalahkan diri sendiri, tapi sekarang aku belajar bahwa kejadian itu bukan salahku.',
            'Hari ini aku memberanikan diri untuk cerita. Aku ingin merasa lebih lega dan tidak memendam sendiri.',
            'Aku butuh ruang aman untuk didengar tanpa dihakimi. Terima kasih karena menyediakan tempat seperti ini.',
            'Aku masih belajar memulihkan diri pelan-pelan. Kadang terasa berat, tapi aku tetap mencoba.',
            'Aku ingin orang lain tahu: kamu tidak sendirian. Ada jalan untuk mencari bantuan dan dukungan.',
            'Aku pernah takut bicara karena khawatir tidak dipercaya. Sekarang aku belajar percaya pada diriku.',
            'Beberapa hari terasa baik, beberapa hari terasa sulit. Tapi aku berusaha tetap bertahan.',
            'Aku menulis ini sebagai langkah kecil. Semoga aku bisa lebih kuat dari hari ke hari.',
            'Aku berharap lingkungan di sekitarku lebih peka dan tidak menormalisasi kekerasan dalam bentuk apa pun.',
            'Aku butuh waktu untuk pulih, dan itu tidak apa-apa. Aku berhak merasa aman.',
            'Aku ingin memulai dari sini: mengakui yang terjadi, dan memberi diri sendiri ruang untuk sembuh.',
            'Kalau kamu membaca ini, aku harap kamu juga menemukan dukungan yang kamu butuhkan.',
        ];

        foreach ($stories as $story) {
            AnonymousStory::create([
                'story' => $story,
            ]);
        }
    }
}
