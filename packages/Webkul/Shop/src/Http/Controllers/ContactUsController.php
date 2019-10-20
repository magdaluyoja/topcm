<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Webkul\Customer\Mail\ContactUsEmail;
use Illuminate\Routing\Controller;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Cookie;

/**
 * ContactUs controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;
    protected $customer;
    protected $customerGroup;

    /**
     * @param CustomerRepository object $customer
     */
    public function __construct(CustomerRepository $customer, CustomerGroupRepository $customerGroup)
    {
        $this->_config = request('_config');
        $this->customer = $customer;
        $this->customerGroup = $customerGroup;
    }

    /**
     * Method to send Email
     *
     * @return Mixed
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'full_name' => 'string|required',
            'email' => 'email|required',
            'subject' => 'string|required',
            'message' => 'string|required',
        ]);

        $data = request()->input();
        
        $data['channel_id'] = core()->getCurrentChannel()->id;

        $data['customer_group_id'] = $this->customerGroup->findOneWhere(['code' => 'general'])->id;

        $contactusData['full_name'] = $data['full_name'];
        $contactusData['email'] = $data['email'];
        $contactusData['subject'] = $data['subject'];
        $contactusData['message'] = $data['message'];
        $contactusData['token'] = md5(uniqid(rand(), true));
        $data['token'] = $contactusData['token'];

        try {
            Mail::queue(new ContactUsEmail($contactusData));

            session()->flash('success', trans('shop::app.customer.contactus.sent'));
        } catch (\Exception $e) {
            session()->flash('info', trans('shop::app.customer.contactus.failed'));
        }

        return redirect($this->_config['redirect']);
    }
}

