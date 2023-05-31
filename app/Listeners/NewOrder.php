<?php

namespace App\Listeners;



class NewOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {


        // $pdf = PDF::loadView('myPDF', $event->order);

        // // Store the PDF file
        // $pdfPath = storage_path("pdf/$event->order->number.pdf");
        // $pdf->save($pdfPath);

        // // Save the URL in the database
        // $pdfUrl = url("storage/pdf/$event->order->number.pdf");
        
    }
}