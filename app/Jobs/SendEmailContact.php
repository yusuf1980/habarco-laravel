<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Setting;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailContact extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $email;
    protected $data;

    public function __construct($penmail, $data)
    {
        //$set = Setting::where('key', 'terima-email')->first();
        //$penerimaEmail = unserialize($set->value);
        $this->email = $penmail;

        $this->data = $data;
        //dd($this->message);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $email = $this->email;
        $data = $this->data;
        $mailer->send('emails.contact', $data, function ($m) use ($email, $data) {
            $m->from('admin@wamet.com', 'Administrator Wamet');
            $m->subject('Ada Pesan dari ke form kontak')
                    ->to($email);
        });
    }
}
