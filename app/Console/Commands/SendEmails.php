<?php

namespace App\Console\Commands;

use App\Jobs\SendPostEmails;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending the emails to the subscribed users based on the post';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending emails to the subscribed users based on the post');

        $posts = \App\Models\Post::all();
        foreach ($posts as $post) {
            dispatch(new SendPostEmails($post));
        }

        $this->info('All done!');

    }
}
