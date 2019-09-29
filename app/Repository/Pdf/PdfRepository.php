<?php

namespace App\Repository\Pdf;

use Carbon\Carbon;
use App\Repository\Pdf;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use App\Repository\CRUDInterface;
use App\Media;

abstract class PdfRepository implements CRUDInterface{

    // should be used from child class
    /*za brisanje*/
/*$pdf = new PdfBill();
$pdf->entityTypeId = $data['service_id'];
$pdf->fileName = 'Faktura204';
$pdf->printPdf($html);*/


    use HeadHtml;
    use FooterHtmp;

    public $entityType = 'test';
    public $entityTypeId ='';
    public $fileName = 'faktura';
    public static $id;

    protected $path = '../storage/app/pdf/';
    protected $headHtml;
    protected $footerHtml;

    private $cofigPdf = [
        'mode' => 'utf-8',
        'format' => [210, 297],
        'orientation' => 'P'
    ];

    private $mpdfObject;

    public function __construct()
    {
        $this->headHtml();
        $this->footerHtml();

        try {
            $this->mpdfObject = new Mpdf( $this->cofigPdf );
        } catch (MpdfException $e) {
            echo $e;
        }
    }

    /**
     * Creates pdf file from passed html string
     *
     * @var string
     */
    public function printPdf ($dataHtml)
    {
        $html = $this->headHtml . $dataHtml . $this->footerHtml;
        $filePathName = $this->path . $this->fileName();


        try {
            $this->mpdfObject->WriteHTML( $html );
        } catch (MpdfException $e) {
            echo $e;
        }
        try {
           $this->mpdfObject->Output( $filePathName, 'F' );
        } catch (MpdfException $e) {
            echo $e;
        }

        self::save([
            'entity_type' => $this->entityType,
            'entity_type_id' => $this->entityTypeId,
            'type' =>'pdf',
            'path' => $filePathName,
        ]);
    }

    /**
     * Sets html document head
     *
     * @var string
     */
    public function headHtml ()
    {
        $this->headHtml = $this->headHtmlstring();
    }

    /**
     * Sets html document footer
     *
     * @var string
     */
    public function footerHtml ()
    {
        $this->footerHtml = $this->footerHtmlstring();
    }

    /**
     * Seve to media table.
     *
     * @var array
     */
    public static function save ($data)
    {

        $id = DB::table('media')->insertGetId([
            'entity_type' => $data['entity_type'],
            'entity_type_id' => $data['entity_type_id'],
            'type' => $data['type'],
            'path' => $data['path'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        self::$id = $id;
    }
    public static function getAll()
    {
        return Media::all();
    }

    public static function getById($id)
    {
        return Media::find($id);
    }

    public static function update($params, $id)
    {
        $CarUser = Media::findOrFail($id);
        $CarUser->update($params);
    }

    public static function delete($id)
    {
        $CarUser = Media::find($id);
        $CarUser->delete();
    }

    /**
     *  Generates name of the file.
     *
     * @return string
     */
    private function fileName()
    {
        return $this->fileName .'_'. time(). '.pdf';
    }


}

