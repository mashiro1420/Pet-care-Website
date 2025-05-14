<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class XacNhanDatLichMail extends Mailable
{
    use Queueable, SerializesModels;
    public $thong_tin;

    /**
     * Create a new message instance.
     */
    public function __construct($thong_tin)
    {
        $this->thong_tin = $thong_tin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xác nhận đặt lịch',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view_id = $this->getViewId($this->thong_tin);

        return new Content(
            view: 'template_xac_nhan_dat_lich',
            with: [
                'thong_tin' => $this->thong_tin,
                'view_id' => $view_id,
            ],
        );
    }

    private function getViewId($thong_tin)
    {
        $loai = $thong_tin['loai'] ?? null;
        $dich_vu = $thong_tin['dich_vu'] ?? null;

        if ($dich_vu === 'TC') {
            return match ($loai) {
                1 => 'dat_lich_tc_thanh_cong',
                2 => 'sua_lich_tc_thanh_cong',
                4 => 'thanh_toan_tc_thanh_cong',
                5 => 'huy_lich_tc_thanh_cong',
                default => 'default_tc',
            };
        }

        if ($dich_vu === 'CS') {
            return match ($loai) {
                1 => 'dat_lich_cs_thanh_cong',
                2 => 'sua_lich_cs_thanh_cong',
                3 => 'hoan_thanh_cs',
                4 => 'thanh_toan_cs_thanh_cong',
                5 => 'huy_cs_thanh_cong',
                default => 'default_cs',
            };
        }

        return 'default';
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
