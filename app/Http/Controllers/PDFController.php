<?php // app/Http/Controllers/PDFController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCPDF;

class PDFController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function generatePDF(Request $request)
    {
        //dd($request);
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->AddPage();
        $this->addCover($pdf, $request->file('front_image'), $request->author,$request->title);

        $pageCount = max(1, intval($request->page_number)); // Ensure at least 1 page is generated

        for ($i = 1; $i <= $pageCount; $i++) {
            $pdf->AddPage();
            $this->addPageContent($pdf, $request->file('page_image'), $request->page_content);
        }
        $pdf->AddPage();
        $this->addBackCover($pdf, $request->file('background_image'), $request->back_cover_content, $request->price);
        $pdf->Output('kdp_printable_book.pdf', 'I');
    }

    private function addCover($pdf, $image, $author, $title)
    {
    $pdf->Image($image->getPathName(), 10, 10, 210, 297);
    $pdf->writeHTMLCell(0, 10, '', '', '<h1 style="text-align:center; margin:50%">'.$title .'</h1><br><br><Br><br  style=""><p style="text-align:center"; >Wrriten By : <b>' . $author.'</b></p>');

    //$pdf->writeHTMLCell(0, 0, '', '', $author);
    }

    private function addPageContent($pdf, $image, $content)
    {
        //$pdf->Image($image->getPathName(), 10, 10, 210, 297);
        //$pdf->writeHTMLCell(0, 0, '', '', $content);
    $pdf->Image($image->getPathName(), 10, 10, 105, 297);
    $pdf->SetXY(120, 10); 
    $pdf->writeHTMLCell(0, 0, '', '', $content);

    }

    private function addBackCover($pdf, $image, $content, $price)
    {
        $pdf->Image($image->getPathName(), 10, 50, 210, 297);
        $pdf->writeHTMLCell(0, 10, '', '', $content .'<br><br><Br><br  style=""><p style="text-align:center"; >Price: <b>' . $price.'/-</b></p>');
       // $pdf->writeHTMLCell(0, 0, '', '', 'Price: ' . $price);
    }
}
