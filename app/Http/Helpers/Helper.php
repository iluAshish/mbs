<?php

namespace App\Http\Helpers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\SiteInformation;
use App\Models\User;
use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use PHPMailer\PHPMailer\PHPMailer;

class Helper
{
    public static function loggedUserName()
    {
        $logged = Auth::user();
        if ($logged) {
            return $logged->name;
        }
    }

    public static function loggedUserProfileImage()
    {
        //$logged = Auth::guard('admin')->user();
        $image = asset('app/dist/img/user-default.png');
        $logged = Auth::user();
        if ($logged && $logged->profile_image != NULL) {
            //  $image = asset($logged->profile_image);
            $image = Request::root() . '/' . $logged->profile_image;
        }
        return $image;
    }

    public static function sitePrefix()
    {
        return strtolower('admin/');
    }
    public static function getLogo()
    {
        $siteInfo = SiteInformation::first();
        $image = asset('web/images/main-logo.png');
        if (isset($siteInfo->logo)) {
            $image = Request::root() . '/' . $siteInfo->logo;
        }
        return $image;
    }
        public static function getdashLogo()
    {


        $siteInfo = SiteInformation::first();
        $image = asset('web/images/icons/pentacodesIcon.png');
        if ($siteInfo->logo) {
            $image = Request::root() . '/' . $siteInfo->dashboard_logo;
        }
        return $image;
    }

    public static function mailConf($subject)
    {
        $siteInfo = SiteInformation::first();
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // $mail->SMTPDebug = 1;
        $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
        $mail->Host = config('mail.mailers.smtp.host');  //gmail has host > smtp.gmail.com
        $mail->Port = config('mail.mailers.smtp.port'); //gmail has port > 587 . without double quotes
        $mail->Username = config('mail.mailers.smtp.username'); //your username. actually your email
        $mail->Password = config('mail.mailers.smtp.password'); // your password. your mail password
        $mail->CharSet = 'utf-8';
        $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        return $mail;
    }

    public static function SendContactMail($contact)
    {

        $siteInfo = SiteInformation::first();

          if ($siteInfo->footer_logo){
            $logo = Request::root() . '/' . $siteInfo->footer_logo;
        }
        else{
            $logo = asset('web/images/main-logo.png');
        }

        $fb_icon = asset('web/images/icons/facebook.png');
        $insta_icon = asset('web/images/icons/instagram.png');
        $linkedin_icon = asset('web/images/icons/linkedin.png');
        $twitter_icon = asset('web/images/icons/twitter.png');

        $subject = ($contact->subject != NULL) ? $contact->subject : ' Enquiry';
        $subject = $siteInfo->brand_name . ' - ' . $subject;

        $mail = self::mailConf($subject);
        $searchArr = ["{name}", "{email}", "{phone}","{company}", "{message}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}","{linkedin_icon}","{twitter_icon}","{linkedin_url}","{twitter_url}"];
        $replaceArr = [$contact->name, $contact->email, $contact->phone,$contact->date_of_appointment, $contact->message, $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon,$linkedin_icon,$twitter_icon,$siteInfo->linkedin_url,$siteInfo->twitter_url];
        $body = file_get_contents(resource_path('views/mail_template/contact_enquiry.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($siteInfo->email_recipient);
        // $mail->setFrom($siteInfo->email_recipient);

        $mail->send();

        if ($mail) {
            return true;
        } else {
            return false;
        }
    }


    public static function SendServiceEnquiryMail($enquiry)
    {
        $siteInfo = SiteInformation::first();

        if ($siteInfo->footer_logo){
            $logo = Request::root() . '/' . $siteInfo->footer_logo;
        }
        else{
            $logo = asset('web/images/main-logo.png');
        }

        $fb_icon = asset('web/images/icons/facebook.png');
        $insta_icon = asset('web/images/icons/instagram.png');
        $linkedin_icon = asset('web/images/icons/linkedin.png');
        $twitter_icon = asset('web/images/icons/twitter.png');

        $subject = ($enquiry->subject != NULL) ? $enquiry->subject : 'Request More Info';

        $subject = $siteInfo->brand_name . ' - ' . $subject;
        $mail = self::mailConf($subject);
        if ($enquiry->service_id != NULL) {
            $searchArr = [
                "{name}", "{email}", "{phone}", "{service}","{product_id}", "{message}", "{type}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}","{linkedin_icon}","{twitter_icon}","{linkedin_url}","{twitter_url}"
            ];
            $replaceArr = [
                $enquiry->name, $enquiry->email, $enquiry->phone, @$enquiry->service->title,$enquiry->product_id, $enquiry->message, ucwords($enquiry->type), $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon,$linkedin_icon,$twitter_icon,$siteInfo->linkedin_url,$siteInfo->twitter_url
            ];
            $body = file_get_contents(resource_path('views/mail_template/service_enquiry.blade.php'));
        } else {
            $searchArr = [
                "{name}", "{email}", "{phone}","{product_id}", "{message}", "{type}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}","{linkedin_icon}","{twitter_icon}","{linkedin_url}","{twitter_url}"
            ];
            $replaceArr = [
                $enquiry->name, $enquiry->email, $enquiry->phone,$enquiry->product->title, $enquiry->message, ucwords($enquiry->type), $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon,$linkedin_icon,$twitter_icon,$siteInfo->linkedin_url,$siteInfo->twitter_url
            ];
            $body = file_get_contents(resource_path('views/mail_template/product_enquiry.blade.php'));
        }
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($siteInfo->email_recipient);
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }

    // public static function SendContactReply($enquiry)
    // {

    //     $siteInfo = SiteInformation::first();

    //       if ($siteInfo->footer_logo){
    //         $logo = Request::root() . '/' . $siteInfo->footer_logo;
    //     }
    //     else{
    //         $logo = asset('web/images/main-logo.png');
    //     }

    //     $fb_icon = asset('web/images/icons/facebook.png');
    //     $insta_icon = asset('web/images/icons/instagram.png');
    //     $linkedin_icon = asset('web/images/icons/linkedin.png');
    //     $twitter_icon = asset('web/images/icons/twitter.png');

    //     $subject = ($enquiry->subject != NULL) ? $enquiry->subject : $siteInfo->brand_name . ' - Contact Enquiry Reply';
    //     $mail = self::mailConf($subject);
    //     $searchArr = ["{name}", "{message}", "{reply}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}","{linkedin_icon}","{twitter_icon}","{linkedin_url}","{twitter_url}"];
    //     $replaceArr = [$enquiry->name, $enquiry->message, $enquiry->reply, $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon,$linkedin_icon,$twitter_icon,$siteInfo->linkedin_url,$siteInfo->twitter_url];
    //     $body = file_get_contents(resource_path('views/mail_template/contact_enquiry_reply.blade.php'));
    //     $body = str_replace($searchArr, $replaceArr, $body);
    //     $mail->MsgHTML($body);
    //     $mail->addAddress($enquiry->email, $enquiry->name);
    //     $mail->send();
    //     if ($mail) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public static function SendTextUsPartnerReply($enquiry)
    // {
    //     $siteInfo = SiteInformation::first();

    //     if ($siteInfo->footer_logo)
    //         $logo = Request::root() . '/' . $siteInfo->footer_logo;
    //     else
    //         $logo = asset('app/dist/img/default-150x150.png');

    //     $fb_icon = asset('web/images/facebook-white.png');
    //     $insta_icon = asset('web/images/instagram-white.png');

    //     $subject = ($enquiry->subject != NULL) ? $enquiry->subject : $siteInfo->brand_name . ' - Text Us Partner Reply';
    //     $mail = self::mailConf($subject);
    //     $searchArr = ["{name}", "{message}", "{reply}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}"];
    //     $replaceArr = [$enquiry->name, $enquiry->message, $enquiry->reply, $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon];
    //     $body = file_get_contents(resource_path('views/mail_template/text_us_partner_enquiry_reply.blade.php'));
    //     $body = str_replace($searchArr, $replaceArr, $body);
    //     $mail->MsgHTML($body);
    //     $mail->addAddress($enquiry->email, $enquiry->name);
    //     $mail->send();
    //     if ($mail) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public static function sendServiceEnquiryReply($enquiry)
    // {
    //     $siteInfo = SiteInformation::first();

    //       if ($siteInfo->footer_logo){
    //         $logo = Request::root() . '/' . $siteInfo->footer_logo;
    //     }
    //     else{
    //         $logo = asset('web/images/main-logo.png');
    //     }

    //     $fb_icon = asset('web/images/icons/facebook.png');
    //     $insta_icon = asset('web/images/icons/instagram.png');
    //     $linkedin_icon = asset('web/images/icons/linkedin.png');
    //     $twitter_icon = asset('web/images/icons/twitter.png');

    //     $subject = ($enquiry->subject != NULL) ? $enquiry->subject : config('app.name') . ' - Enquiry Reply';
    //     $mail = self::mailConf($subject);
    //     $searchArr = ["{name}", "{message}", "{reply}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}","{linkedin_icon}","{twitter_icon}","{linkedin_url}","{twitter_url}"];
    //     $replaceArr = [$enquiry->name, $enquiry->message, $enquiry->reply, config('app.name'), $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon,$linkedin_icon,$twitter_icon,$siteInfo->linkedin_url,$siteInfo->twitter_url];
    //     $body = file_get_contents(resource_path('views/mail_template/contact_enquiry_reply.blade.php'));
    //     $body = str_replace($searchArr, $replaceArr, $body);
    //     $mail->MsgHTML($body);
    //     $mail->addAddress($enquiry->email, $enquiry->name);
    //     $mail->send();
    //     if ($mail) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public static function forgotMail($contact)
    {
        $siteInfo = SiteInformation::first();

          if ($siteInfo->footer_logo){
            $logo = Request::root() . '/' . $siteInfo->footer_logo;
        }
        else{
            $logo = asset('web/images/maglogo.png');
        }

        $fb_icon = asset('web/images/icons/facebook.png');
        $insta_icon = asset('web/images/icons/instagram.png');

        $subject = $siteInfo->brand_name . ' - Reset Password Notification';
        $link = url('/admin/reset-password/' . $contact->token);
        $mail = self::mailConf($subject);
        $searchArr = ["{name}", "{link}", "{site_name}", "{facebook_url}", "{instagram_url}", "{logo}", "{fb_icon}", "{insta_icon}"];
        $replaceArr = [$contact->name, $link, $siteInfo->brand_name, $siteInfo->facebook_url, $siteInfo->instagram_url, $logo, $fb_icon, $insta_icon];
        $body = file_get_contents(resource_path('views/mail_template/forgot_password.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($contact->email, $contact->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    public static function uploadFile($file, $location, $fileName = null)
    {
        if (!File::exists(public_path($location))) {
            mkdir(public_path($location), 0777, true);
        }
        if ($fileName == null) {
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $fileName = $name;
        }
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . time() . '.' . $file->getClientOriginalExtension();
        $fileName = str_replace('--', '-', $fileName);
        $target = $location . $fileName;
        if (File::exists(public_path($target))) {
            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = $name . '_' . $increment . '.' . $ext;
                $target = $location . $fileName;
            }
        }
        $file->move(public_path($location), $fileName);
        return $target;
    }

    public static function uploadWebpImage($file, $location, $fileName)
    {
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . time() . '.webp';
        $fileName = str_replace('--', '-', $fileName);

        if (!File::exists(public_path($location))) {
            File::makeDirectory(public_path($location), 0777, true);
        }
        $target = $location . $fileName;
        if (File::exists(public_path($target))) {
            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = $name . '_' . $increment . '.' . $ext;
                $target = $location . $fileName;
            }
        }
        // $ext=$file->extension();
        // if($ext == 'webp')
        // {

        // }
        // else
        // {
           Webp::make($file)->save(public_path($target));
        // }
        return $target;
    }

    public static function limit_text($text, $limit)
    {
        $text = strip_tags($text);
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }


    public static function deleteFile($collection, $fieldName)
    {
        if (File::exists(public_path($collection->$fieldName))) {
            File::delete(public_path($collection->$fieldName));
        }
    }



    /**
     * print an image with webp on pages with picture tag.
     *
     * @param Collection $collection The eloquent collection.
     * @param string $field the name of the field.
     * @param string $webpField the name of the webp field.
     * @param string $attributeField the name of the attribute field.
     * @param string $cssClass the css class of the image.
     *
     * @return string html code for printing image on pages.
     */

    public static function printImage($collection, $field, $webpField, $attributeField, $cssClass = null, $cssStyle = null, $height = null, $width = null)
    {
        $imageData = '<picture>';

        if (!empty($collection->$webpField) && File::exists(public_path($collection->$webpField))) {
            $imageData .= '<source srcset="' . asset($collection->$webpField) . '" type="image/webp">';
        }
        if (!empty($collection->$field) && File::exists(public_path($collection->$field))) {
            $imageData .= '<img src="' . asset($collection->$field) . '" ';
        } else {
            $imageData .= '<img src="' . asset('web/images/default-image.jpg') . '" alt="Default Image"';
            //            if ($field == 'desktop_image' || $field == 'desktop_banner') {
            //                $imageData .= '<img src="' . asset('web/images/default-image-rect.jpg') . '" alt="Default Image"';
            //            } else if ($field == 'profile_image') {
            //                $imageData .= '<img src="' . asset('web/images/user-default.png') . '" alt="Default Image"';
            //            } else {
            //                $imageData .= '<img src="' . asset('web/images/default-image.jpg') . '" alt="Default Image"';
            //            }
        }
       
        if ($cssClass) {
            $imageData .= ' class="' . $cssClass . '"';
        }
        if ($cssStyle) {
            $imageData .= ' style="' . $cssStyle . '"';
        }
        if ($width) {
            $imageData .= ' width="' . $width .'"';
            
        }
        if ($height) {
            $imageData .= ' height="' . $height . '"';
        }
         if ($attributeField) {
             if(isset($collection->$attributeField)){
                 $imageData .= $collection->$attributeField;
             }else{
                 $imageData .= $attributeField;
             }
            
        }
        $imageData .= ' ></picture>';

        return $imageData;
    }

    public function getRatingPercentage($rating)
    {
        $textTestimonialRating = 0;
        switch ($rating) {
            case 1:
                $textTestimonialRating = 15;
                break;
            case 2:
                $textTestimonialRating = 40;
                break;
            case 3:
                $textTestimonialRating = 55;
                break;
            case 4:
                $textTestimonialRating = 80;
                break;
            case 5:
                $textTestimonialRating = 100;
                break;
            default:
                $textTestimonialRating = 0;
                break;
        }
        return $textTestimonialRating;
    }
}
