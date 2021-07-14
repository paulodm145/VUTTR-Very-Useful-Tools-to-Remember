<?php

use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->insert([
            [
                'title' => 'Notion',
                'link' => 'https://notion.so',
                'description' => 'All in one tool to organize teams and ideas. Write, plan, collaborate, and get organized. ',
            ],
            [
                'title' => 'json-server',
                'link' => 'https://github.com/typicode/json-server',
                'description' => 'Fake REST API based on a json schema. Useful for mocking and creating APIs for front-end devs to consume in coding challenges.'
            ], 
            [
                'title' => 'fastify',
                'link' => 'https://www.fastify.io/',
                'description' => 'Extremely fast and simple, low-overhead web framework for NodeJS. Supports HTTP2.'
            ]
        ]);
    }
}
