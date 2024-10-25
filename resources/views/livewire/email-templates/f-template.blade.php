<div  class="f-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">
    <div class=" py-10 "  >
        <div style="background-color: #5f2fda;">
            <div class="esd-block-text es-p30t pt-12 ">
                <p class=" text-center" style="color: #ffffff; font-size: 28px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">This Halloween season, we've got a<br></p>
                <p class=" text-center" style="color: #ffffff; font-size: 28px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">&nbsp;treat for you!</p>
            </div>
        </div>
        <div class="esd-block-image" style="font-size: 0px;"><a href="#">
                <img class="adapt-img" src="http://127.0.0.1:8000/assets/img/helloween_email/hero.png" alt="hero" style="display: block;" width="100%"></a>
        </div>
        <div style="background-color: #10003a">
        <div class="esd-block-text" bgcolor="#10003A" style="padding-bottom: 30px;padding-top: 30px;">
            <p class=" text-center" style="font-size: 25px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; color: #ffffff;">{{ $subject ?? 'No subject' }}</p>

            <p class="px-4 text-center" style="font-size: 25px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; color: #ffffff;">{{ $body ?? 'No body' }}</p>
        </div>
        <div class="flex justify-end" style="  background-color: #10003a; padding:0px 50px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: #383838; text-align: left;" >
            <div class="float-right" style="line-height: 200%;">
                <span style="font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; font-size: 16px; line-height: 200%; color: #fff;">{{ $signature ?? 'No signature' }}</span>
                <br>
                <span style="font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; font-size: 16px; line-height: 200%; color: #fff;">CEO, Fun Co.</span>
            </div>
        </div>
        <div  class="esd-block-image flex justify-center pb-10" style="font-size: 0px;"><a><img class="adapt-img" src="http://127.0.0.1:8000/assets/img/helloween_email/skull.png" alt="" style="display: block;" width="230"></a></div>
    </div>
    </div>
{{--    <div dir="ltr" class="es-wrapper-color">--}}
{{--        <!--[if gte mso 9]>--}}
{{--        <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">--}}
{{--            <v:fill type="tile" color="#f6f6f6"></v:fill>--}}
{{--        </v:background>--}}
{{--        <![endif]-->--}}
{{--        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td class="esd-email-paddings" valign="top">--}}
{{--                    <table class="es-content esd-header-popover" cellspacing="0" cellpadding="0" align="center">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td class="esd-stripe" align="center">--}}
{{--                                <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td class="esd-structure es-p20t" align="left" bgcolor="#5F2FDA" style="background-color: #5f2fda;">--}}
{{--                                            <table width="100%" cellspacing="0" cellpadding="0">--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td class="esd-container-frame" width="600" valign="top" align="center">--}}
{{--                                                        <table width="100%" cellspacing="0" cellpadding="0">--}}
{{--                                                            <tbody>--}}

{{--                                                            <tr>--}}
{{--                                                                <td align="center" class="esd-block-text es-p30t">--}}
{{--                                                                    <p style="color: #ffffff; font-size: 28px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">This Halloween season, we've got a<br></p>--}}
{{--                                                                    <p style="color: #ffffff; font-size: 28px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">&nbsp;treat for you!</p>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a href="#">--}}
{{--                                                                        <img class="adapt-img" src="{{ asset('assets/img/helloween_email/hero.png') }}"  alt="hero" style="display: block;" width="600"></a></td>--}}
{{--                                                            </tr>--}}
{{--                                                            <tr>--}}
{{--                                                                <td align="center" class="esd-block-text" bgcolor="#10003A" style="padding-bottom: 30px;padding-top: 30px;">--}}
{{--                                                                    <p style="font-size: 25px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; color: #ffffff;">This Halloween season, we've got a treat<br> for you! Introducing the Spooky Savings<br> Credit Card</p>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left" esd-custom-block-id="310568" bgcolor="#10003A" style="background-color: #10003a;">--}}
{{--                                            <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="272" valign="top"><![endif]-->--}}
{{--                                            <table class="es-left" cellspacing="0" cellpadding="0" align="left">--}}
{{--                                                <tbody>--}}

{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                            <!--[if mso]></td><td width="15"></td><td width="273" valign="top"><![endif]-->--}}
{{--                                            <table class="es-right" cellspacing="0" cellpadding="0" align="right">--}}
{{--                                                <tbody>--}}

{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                            <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                        </td>--}}

{{--                                    <tr>--}}
{{--                                        <td style="  background-color: #10003a; padding:0px 50px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: #383838; text-align: left;" name="tblCell" valign="top" align="left">--}}
{{--                                            <div class="float-right" style="line-height: 200%;">--}}
{{--                                                <span style="font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; font-size: 16px; line-height: 200%; color: #fff;">Susie Banchon</span>--}}
{{--                                                <br>--}}
{{--                                                <span style="font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif; font-size: 16px; line-height: 200%; color: #fff;">CEO, Fun Co.</span>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}

{{--                                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#10003a" style="background-color: #10003a;padding-top: 40px;">--}}
{{--                                            <table cellpadding="0" cellspacing="0" width="100%">--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td width="560" class="esd-container-frame" align="center" valign="top">--}}
{{--                                                        <table cellpadding="0" cellspacing="0" width="100%">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a><img class="adapt-img"  src="{{ asset('assets/img/helloween_email/skull.png') }}"  alt style="display: block;" width="230"></a></td>--}}
{{--                                                            </tr>--}}

{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
</div>
