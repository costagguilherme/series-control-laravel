<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Mail\UsersCreatedMail;

class NewUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $name;
    public string $email;
    public int $user_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $email,
        int $user_id
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->user_id);
        $email = new UsersCreatedMail(
            $this->name, 
            $this->email, 
        );
        Mail::to($user)->queue($email);
    }
}
