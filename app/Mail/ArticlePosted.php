<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticlePosted extends Mailable
{
    use Queueable, SerializesModels;
    // membuat construct untuk mengambil data dari database agar di tampilkan di email
    protected $article;
    /**
     * Create a new message instance.
     */
    public function __construct($article)
    {
        // variable $article di dapat dari controller article dan di masukkan ke dalam variable protected $article. dari situ lah kita bisa mengambil nilai yang ada di dalamnya untuk di tampilkan pada email
        $this->article = $article;
    }

    /**
     * Get the message envelope.
     */
    // adalah header dari email
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('admin@gmail.com', 'Admin'),
            subject: "Article Baru Anda:    {$this->article->title}",
        );
    }

    /**
     * Get the message content definition.
     */
    // digunakan untuk mengirim data dari costructor agar bisa di tampilkan pada view mails.articlePosted.blade.php
    public function content(): Content
    {
        return new Content(
            view: 'mails.ArticlePosted',
            with: [
                'article' => $this->article
            ]
        );
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
