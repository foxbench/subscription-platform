<?php

namespace App\Jobs;

use App\Mail\PostNotification;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendPostEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    /**
     * Create a new job instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = $this->post->website->subscribers;
        foreach ($subscribers as $subscriber) {

            if ($subscriber->created_at > $this->post->created_at) {
                // Skip sending email if the subscriber was created after the post was created
                continue;
            }

            // Check if the email has been sent for this post and subscriber
            if (!$this->post->subscribers->contains($subscriber->id)) {

                \Mail::to($subscriber->email)->send(new PostNotification($this->post));

                // Record that the email has been sent
                $this->post->subscribers()->attach($subscriber->id);

                Log::info('Email sent to ' . $subscriber->email . ' for post ' . $this->post->title);
            }
        }
    }
}
