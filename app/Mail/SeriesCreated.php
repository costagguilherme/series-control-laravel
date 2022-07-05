<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeriesCreated extends Mailable
{
    use Queueable, SerializesModels;

    public string $nameSerie;
    public int $serieId;
    public int $qtdTemp;
    public int $episodePerTemp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nameSerie, int $serieId, int $qtdTemp, int $episodePerTemp)
    {
        $this->nameSerie = $nameSerie;
        $this->serieId = $serieId;
        $this->qtdTemp = $qtdTemp;
        $this->episodePerTemp = $episodePerTemp;
        $this->subject = 'Série ' . $nameSerie . ' criada com sucesso';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}
