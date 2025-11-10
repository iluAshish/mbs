<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Enquiry;
use App\Models\Newsletter;
use App\Models\TextUsPartnerEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnquiryController extends Controller
{
    public function enquiry_list()
    {
        $title = "Enquiry List";
        $enquiryList = Enquiry::where('enquiry_type','contact-us')->orderBy('id', 'desc')->get();
        return view('app.enquiry.list', compact('enquiryList', 'title'));
    }

    public function enquiry_view($id)
    {
        $title = "View Request";
        $enquiry = Enquiry::find($id);
        return view('app.enquiry.view', compact('enquiry', 'title'));
    }

    public function delete_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = Enquiry::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = Enquiry::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function service_enquiry_list()
    {
        $title = "Enquiry List";
        $enquiryList = Enquiry::where('enquiry_type','service-detail')->whereNotNull('product_id')->orderBy('id', 'desc')->get();
        return view('app.enquiry.service_enquiry.list', compact('enquiryList', 'title'));
    }

    public function service_enquiry_view($id)
    {
        $title = "View Request";
        $enquiry = Enquiry::find($id);
        return view('app.enquiry.service_enquiry.view', compact('enquiry', 'title'));
    }

    public function delete_service_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = Enquiry::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_service_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = Enquiry::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
    public function product_enquiry_list()
    {
        $title = "Enquiry List";
        $enquiryList = Enquiry::where('enquiry_type','product-detail')->whereNotNull('product_id')->orderBy('id', 'desc')->get();;
        return view('app.enquiry.product_enquiry.list', compact('enquiryList', 'title'));
    }

    public function product_enquiry_view($id)
    {
        $title = "View Request";
        $enquiry = Enquiry::find($id);
        return view('app.enquiry.product_enquiry.view', compact('enquiry', 'title'));
    }

    public function delete_product_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = Enquiry::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_product_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = Enquiry::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    // brand details enquiry functions can be added here

    public function brand_enquiry_list()
    {
        $title = "Brand Enquiry List";
        $enquiryList = Enquiry::where('enquiry_type','brand-detail')->whereNotNull('brand_id')->orderBy('id', 'desc')->get();;
        return view('app.enquiry.brand_enquiry.list', compact('enquiryList', 'title'));
    }

    public function brand_enquiry_view($id)
    {
        $title = "View Request";
        $enquiry = Enquiry::find($id);
        return view('app.enquiry.brand_enquiry.view', compact('enquiry', 'title'));
    }

    public function delete_brand_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = Enquiry::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_multi_brand_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = Enquiry::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function reply_to_enquiry(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            //    dd($request->all());
            $contact = Enquiry::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->replay;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (Helper::SendContactReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Reply saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Already sent reply')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
        public function reply_to_serviceenquiry(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            //    dd($request->all());
            $contact = Enquiry::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->replay;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (Helper::sendServiceEnquiryReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Reply saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Already sent reply')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
    public function reply_to_text_us_partner(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            //    dd($request->all());
            $contact = TextUsPartnerEnquiry::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->replay;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (Helper::SendTextUsPartnerReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Reply saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
}
