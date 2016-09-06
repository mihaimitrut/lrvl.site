<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Repositories\ProductRepository;

class Sitemap extends Command
{

    protected $storage_path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap';

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
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Product::all()->toArray();

        $xml = '<url>
	<loc>http://lrvl.site/</loc>
	<lastmod>'.date('Y-m-d',time()).'</lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.5</priority>
	</url>
	';
        foreach ($products as $product) {
            $xml .= '<url>
	<loc>http://lrvl.site/'.$product['category_slug'].'/'.$product['title_slug'].'</loc>
	<lastmod>'.date('Y-m-d',time()).'</lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.5</priority>
	</url>
	';
            file_put_contents($this->storage_path."sitemap.xml", $xml);
        }
    }



}
