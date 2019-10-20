<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Corcel\Model\Page;
use Corcel\Model\Post;

/**
 * Home page controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
 class GalleryController extends Controller
{
    protected $_config;
    protected $sliderRepository;
    protected $current_channel;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->_config = request('_config');

        //$this->sliderRepository = $sliderRepository;
    }


    public function getIndexGallery()
    {
        //$currentChannel = core()->getCurrentChannel()->id;
        //$sliderData = $this->sliderRepository->findByField('channel_id', $currentChannel)->toArray();

        return view($this->_config['view']);
    }


    public function getGalleryPage($id)
    {
        $page = Post::find($id);
        return view($this->_config['view'])->with(["page"=>$page]);
    }

    /**
     * loads the home page for the storefront
     */
    public function notFound()
    {
        abort(404);
    }
}