<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\front\BlackFridayEnquiryMail;
use Illuminate\Support\Facades\Log;

class BlackFridayEnquiryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $sendingAddress;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $sendingAddress)
    {
        $this->data = $data;
        $this->sendingAddress = $sendingAddress;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach ( $this->sendingAddress as  $value) {
                Mail::to($value)

                ->send(new BlackFridayEnquiryMail($this->data));
                }
        } catch (\Exception $e) {
            Log::error($e);
            return $e;
        }
    }
}
