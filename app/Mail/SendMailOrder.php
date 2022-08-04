<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('client.mail.order')
            ->from("lythevinh106@gmail.com", "Mobile24H")   //gui tu email ly the vinhgmail, va co teb nguoi gui la ly the vinh
            ->subject("Thư Xác Nhận Đã Đặt Đơn Hàng Thành Công") // tieu de khi nguoi nhan dc
            ->with( // gui du lieu qua view mail demo
                $this->data
            );
    }
}
