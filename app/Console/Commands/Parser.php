<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Repositories\ProductRepository;

class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser';

    /*
     * Where to save xml feeds on disk
     */
    protected $storage_path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $product;

    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->product = $product;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->scrie('https://api.2performant.com/feed/35c4d16fb6f6f.xml','libris.xml');
        $this->import($this->storage_path.'libris.xml', null);
    }

    private function scrie($citeste,$scrie){
        $file_on_server_location = $this->storage_path.$scrie;

		$opts=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);

        $sp = fopen($citeste, 'r', false, stream_context_create($opts));
        $op = fopen($file_on_server_location, 'w');

        while (!feof($sp)) {
            $buffer = fread($sp, 512);  // use a buffer of 512 bytes
            fwrite($op, $buffer);
        }

        // append new data
        //	fwrite($op, $new_data);

        // close handles
        fclose($op);
        fclose($sp);

        // make temporary file the new source
        //rename('tempfile', 'source');
    }

    private function import($uri,$sursa){
        echo date("d.m.Y H:m:s")." START ";
        echo "<br />";

        global $db;
        global $CONF;

        $counter = 1;

        $reader = new \XMLReader();

        $reader->open($uri);
        $contentNS = 'http://purl.org/rss/1.0/modules/content/';

        $i = 0;
        while($reader->read()) {
            usleep(1000);

            if($reader->nodeType == \XMLReader::ELEMENT and $reader->name == 'item') {
                $doc = new \DOMDocument('1.0','UTF-8');
                $xml = simplexml_import_dom($doc->importNode($reader->expand(), true));

                $res = $this->product->findBy('external_id', $xml->product_id);

                if (count($res) > 0) {

                    $database_product = $res->toArray();

                    //daca nu am imagine atunci sa o preiau. Dar am cartea in bd
                    $url = $this->friendlyUrl($xml->title);
                    $url_imagine = str_replace("-","_",$url);
                    $nume_poza = str_pad($database_product[0]['id'],7,'0',STR_PAD_LEFT)."_".$url_imagine;
                    #000 001
                    $dir1 = substr($nume_poza,0,3);
                    $dir2 = substr($nume_poza,3,3);
                    $nume = substr($nume_poza,6);
                    $extensie = pathinfo($xml->image_urls);
                    $extensie = $extensie['extension'];


                    if (!file_exists($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR.$nume.'.'.$extensie)) {
                        if (!is_dir($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR)) {
                            mkdir ($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR, 0777, true);
                        }
                        file_put_contents($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR.$nume.'.'.$extensie, file_get_contents($xml->image_urls));
                    }
                }


                if (count($res) == 0) {
                    $url = $this->friendlyUrl($xml->title);

                    $product = new Product;
                    $product->title = $xml->title;
                    $product->title_slug = $this->friendlyUrl($xml->title);
                    $product->description = $xml->description;
                    $product->category = $xml->category;
                    $product->category_slug = $this->friendlyUrl($xml->category);
                    $product->external_id = $xml->product_id;
                    $product->aff_code = $xml->aff_code;
                    $product->price = $xml->price;
                    $product->image = '';
                    $product->save();

                    $database_product = $product->toArray();

                    $id_produs = $database_product['id'];

                    $url_imagine = str_replace("-","_",$url);
                    $nume_poza = str_pad($id_produs,7,'0',STR_PAD_LEFT)."_".$url_imagine;
                    #000 001
                    $dir1 = substr($nume_poza,0,3);
                    $dir2 = substr($nume_poza,3,3);
                    $nume = substr($nume_poza,6);
                    $extensie = pathinfo($xml->image_urls);
                    $extensie = $extensie['extension'];

                    if(!file_exists($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR.$nume.$extensie)){
                        if(!is_dir($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR)) {
                            mkdir($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR, 0777, true);
                        }

                        $am_pus = file_put_contents($this->storage_path.'product'.DIRECTORY_SEPARATOR.$dir1.DIRECTORY_SEPARATOR.$dir2.DIRECTORY_SEPARATOR.$nume.'.'.$extensie,file_get_contents($xml->image_urls));
                        if($am_pus) {
                            $product->image = $nume_poza.'.'.$extensie;
                            $product->save();
                        }
                    }
                }else{
                    $product = $this->product->find($database_product[0]['id']);
                    $product->aff_code = $xml->aff_code;
                    $product->price = $xml->price;
                    $product->save();
                }

                $reader->next(); //skip the subtrees, go to next item sibling
                // we already expand()ed this so we don't need to walk it.
            }
            $i++;
        }
        echo date("d.m.Y H:m:s")." END<br />";
    }
    private function friendlyUrl($string, $separator = 'dash', $lowercase = TRUE) {
        if ($separator == 'dash') {
            $search = '_';
            $replace = '-';
        }
        else {
            $search = '-';
            $replace = '_';
        }
        if (function_exists('convertAccentsAndSpecialToNormal')) {
            $string = convertAccentsAndSpecialToNormal($string);
        }
        $trans = array(
            '/&\#\d+?;/i'       => '',
            '/&\S+?;/i'         => '',
            '/\.+/i'            => '',
            '/\s+/'             => $replace,
            '/\/+/'             => $replace,
            '/[^a-z0-9\-\._]/i' => '',
            '/'. $replace .'+/' => $replace,
            '/'. $replace .'$/' => $replace,
            '/^'. $replace .'/' => $replace,
            '/\.+$/'            => ''
        );
        $string = strip_tags($string);
        $string = preg_replace(array_keys($trans), array_values($trans), $string);
        if ($lowercase === TRUE) {
            $string = strtolower($string);
        }
        return trim(stripslashes($string));
    }
}
