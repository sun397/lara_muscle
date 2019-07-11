<?php

use Illuminate\Database\Seeder;

class TrainingSelectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_selects')->truncate();
        DB::table('training_selects')->insert([
            [
                'name' => 'ベンチプレス',
            ],
            [
                'name' => 'ダンベルベンチプレス',
            ],
            [
                'name' => 'インクラインベンチプレス',
            ],
            [
                'name' => 'インクラインダンベルプレス',
            ],
            [
                'name' => 'ダンベルフライ',
            ],
            [
                'name' => 'デットリフト',
            ],
        ]);
    }
}
