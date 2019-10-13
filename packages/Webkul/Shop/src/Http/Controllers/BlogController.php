<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Thunder\Shortcode\HandlerContainer\HandlerContainer;
use Thunder\Shortcode\Parser\RegularParser;
use Thunder\Shortcode\Processor\Processor;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Thunder\Shortcode\Parser\WordpressParser;
use Corcel\Model\Post;
use Corcel\Model\Page;
/**
 * Blog page controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
 class BlogController extends Controller
{
    protected $_config;
    protected $sliderRepository;
    protected $current_channel;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->_config = request('_config');

        // $this->sliderRepository = $sliderRepository;
    }

    /**
     * loads the home page for the storefront
     */
    public function index()
    {
        // $currentChannel = core()->getCurrentChannel()->id;
        // $sliderData = $this->sliderRepository->findByField('channel_id', $currentChannel)->toArray();

        $posts = Post::published()->where('post_type','post')->orderBy("ID","desc")->paginate(10);

        return view($this->_config['view'], ["posts"=>$posts]);
    }

    public function getPost($ID)
    {
        $posts = Post::published()->where('post_type','post')->orderBy("ID","desc")->paginate(5);
        $post = Post::find($ID);
        $post_page = Post::find($post->ID);
        return view($this->_config['view'], ["posts"=>$posts,"post"=>$post,"thumbnail"=>$post_page->thumbnail]);
    }

    /**
     * loads the home page for the storefront
     */
    public function notFound()
    {
        abort(404);
    }
}