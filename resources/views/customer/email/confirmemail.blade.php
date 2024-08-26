Hello {{ $name }}<br>
{{-- <p>Thank you for confirming email </p> --}}
<p>You are welcome to the Graphic NewsPlus family, your home of credible, accurate and timely news.</p>
<br><br>
<p><strong>Your Account Details</strong></p>
<ol>
    @if (isset($package_name) && !empty($package_name))
        <li>You have subscribed to the <b>{{$package_name}}</b>.</li>
    @endif
    <li>You can use the same account on both the Graphic NewsPlus app and website.</li>
</ol>
</p>
<h3><strong>Any questions?</strong></h3>
<p>Please check out the Frequently Asked Questions section for answers to some of the most asked questions. Your feedback and thoughts matter a great deal to us. Do not hesitate to share them via feedback@graphicnewsplus.com .<p> 
<p>Thank you for your business and enjoy your stay with us!</p>
<br><br>
<p>Graphic NewsPlus Team</p>
