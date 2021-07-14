<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            [
                [
                    "name"=>'organization',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'organization',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'planning',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'collaboration',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'writing',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'calendar',
                    "tool_id"=>1,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'api',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'json',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'schema',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'node',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'github',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'rest',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'web',
                    "tool_id"=>3,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'framework',
                    "tool_id"=>3,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'node',
                    "tool_id"=>3,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'http2',
                    "tool_id"=>3,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'https',
                    "tool_id"=>3,
                    "created_at"=>date('Y-m-d H:i:s')
                ],
                [
                    "name"=>'localhost',
                    "tool_id"=>2,
                    "created_at"=>date('Y-m-d H:i:s')
                ],

            ]);
    }
}

