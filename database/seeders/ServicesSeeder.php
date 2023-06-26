<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Nabożeństwo pogrzebowe',
                'description' => 'Nabożeństwo pogrzebowe to uroczysta ceremonia, która gromadzi bliskich i znajomych zmarłego w celu wspólnego modlitewnego pożegnania oraz oddania hołdu i uczczenia pamięci osoby, która odeszła.',
                'price' => 100.00,
                'subcategory_id' => 1,
                'image' => '1687293097.jpg',
            ],
            [
                'name' => 'Przygotowanie i wystawienie zdjęcia zmarłego',
                'description' => 'Przygotowanie i wystawienie zdjęcia zmarłego to profesjonalna usługa polegająca na starannym przygotowaniu i wyeksponowaniu fotografii, które oddają pamięć i godność zmarłej osoby.',
                'price' => 50.00,
                'subcategory_id' => 1,
                'image' => '1687293097.jpg',
            ],
            [
                'name' => 'Przygotowanie i wystawienie kwiatów',
                'description' => 'Przygotowanie i wystawienie kwiatów to kompleksowa usługa, która obejmuje staranne przygotowanie bukietów lub wieńców żałobnych oraz ich estetyczne wystawienie, dodając uroku i szacunku podczas ceremonii pogrzebowej.',
                'price' => 100.00,
                'subcategory_id' => 1,
                'image' => '1687293097.jpg',
            ],
            [
                'name' => 'Kremacja indywidualna',
                'description' => '
                Kremacja indywidualna jest to intymne i osobiste rozwiązanie, w którym ciało zmarłego jest indywidualnie kremowane, zapewniając bliskim możliwość zachowania pamięci w sposób prywatny i kameralny.',
                'price' => 1500.00,
                'subcategory_id' => 2,
                'image' => '1687334295.jpg',
            ],
            [
                'name' => 'Kremacje ze sprawdzaniem tożsamości',
                'description' => 'Kremacja ze sprawdzaniem tożsamości zapewnia precyzyjne procesy identyfikacji, gwarantujące, że proces kremacji odbywa się zgodnie z najwyższymi standardami bezpieczeństwa.',
                'price' => 2000.00,
                'subcategory_id' => 2,
                'image' => '1687335040.jpg',
            ],
            [
                'name' => 'Trumna drewniana',
                'description' => 'Trumna drewniana to eleganckie i solidne ostatnie schronienie, wykonane z pięknego drewna, które dodaje uroku i szlachetności ceremonii pogrzebowej.',
                'price' => 500.00,
                'subcategory_id' => 3,
                'image' => '1687294382.jpg',
            ],
            [
                'name' => 'Trumna metalowa',
                'description' => '
                Trumna metalowa wykonana jest z wytrzymałego metalu, zapewniająca solidność i godność podczas ceremonii pogrzebowej.',
                'price' => 800.00,
                'subcategory_id' => 3,
                'image' => '1687294583.jpg',
            ],            [
                'name' => 'Trumna ekologiczna',
                'description' => 'Trumna ekologiczna jest wykonana z naturalnych materiałów, przyjazna dla środowiska i godna zmarłego.',
                'price' => 600.00,
                'subcategory_id' => 3,
                'image' => '1687294668.png',
            ],
        ]);
    }
}
