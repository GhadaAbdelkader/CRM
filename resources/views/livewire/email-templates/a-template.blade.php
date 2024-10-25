<div class="a-template mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow">

    <div>
{{--        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Email Preview</h2>--}}
{{--        <h3 class="text-md font-bold text-gray-800 dark:text-gray-200">Subject: {{ $subject ?? 'No subject' }}</h3>--}}
{{--        <p class="text-gray-700 dark:text-gray-300">Body: {{ $body ?? 'No body' }}</p>--}}
{{--        <p class="mt-4 text-gray-600 dark:text-gray-400">Signature: {{ $signature ?? 'No signature' }}</p>--}}
        <div class="p-8" style="background-color: rgb(245, 245, 245);">
            <div class="bmeImage" style="padding: 10px 20px; border-collapse: collapse;">
                <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/MiniMoustache.png" style="max-width: 1120px; display: block; width: 100%;" alt="" width="100%">
            </div>
            <div name="tblCell" style="padding: 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;">
                <div style="line-height: 125%; text-align: center;">
            <span style="font-size: 24px; font-family: 'Arial Black', 'Avant Garde', Arial; color: #b49e26; line-height: 125%;">
              <strong>Father's Day</strong>
            </span>
                </div>
            </div>
            <div class="bmeImage" style="padding: 15px 20px; border-collapse: collapse;">
                <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/Divider.png" style="max-width: 1120px; display: block; width: 100%;" alt="" width="100%">
            </div>
        </div>
        <div class="bmeImage" style="border-collapse: collapse; padding: 20px 0px;">
            <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/Header.jpg" style="max-width: 1200px; display: block; width: 100%;" alt="" width="100%">
        </div>
        <div class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(232, 228, 201);" width="100%">
            <div class="tblCellMain" style="padding: 10px 20px;"></div>
            <div style="  background-color: rgb(232, 228, 201); ">
                <div style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;">
                    <div style="line-height: 125%; text-align: center;">
                        <span style="font-size: 30px; font-family: Georgia, Palatino; color: #393105; line-height: 125%;">{{ $subject ?? 'No subject' }}</span>
                    </div>
                </div>
            </div>
            <div class="tdPart" style="background-color: rgb(248, 246, 232);">
                <div name="tblText" style=" background-color: rgb(248, 246, 232);" width="100%">
                    <div name="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;">
                        <div style="line-height: 200%; text-align: center;">
                            <span style="font-size: 16px;   word-wrap: break-word; font-family: Georgia, Palatino; color: #666666; line-height: 200%;">{{ $body ?? 'No body' }}</span>
                        </div>
                    </div>
                    <div style="  background-color: rgb(248, 246, 232); padding:0px 50px 30px 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: #383838; text-align: left;">
                        <div class="float-right" style="line-height: 200%;">
                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 200%; color: rgb(56, 56, 56); ">{{ $signature ?? 'No signature' }}</span>
                            <br>
                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 200%; color: rgb(56, 56, 56); ">CEO, Fun Co.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex py-10" style="padding: 20px;"></div>
        </div>
    </div>


{{--    <table style="background-color: rgb(245, 245, 245);" >--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <td width="100%" valign="top" align="center">--}}
{{--                <table name="bmeMainColumnParentTable" style="border-collapse: separate; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;">--}}
{{--                            <table name="bmeMainColumn" class="" style="max-width: 100%; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td class="blk_container bmeHolder" name="bmePreHeader" style="color: rgb(102, 102, 102); border: 0px none transparent;" width="100%" valign="top" bgcolor="" align="center">--}}
{{--                                        <div id="dv_2" class="blk_wrapper">--}}
{{--                                            <table class="blk" name="blk_permission" style="" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                <tbody>--}}
{{--                                                <tr>--}}
{{--                                                    <td name="tblCell" style="padding:20px;" valign="top" align="left">--}}
{{--                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}

{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center">--}}
{{--                                        <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(245, 245, 245);" width="100%" valign="top" bgcolor="#f5f5f5" align="center">--}}
{{--                                                    <div id="dv_3" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="bmeImage" style="padding: 10px 20px; border-collapse: collapse;" align="center">--}}
{{--                                                                                <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/MiniMoustache.png" style="max-width: 1120px; display: block; width: 560px;" alt="" width="560" border="0">--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_9" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="tdPart" valign="top" align="center">--}}
{{--                                                                                <table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left">--}}
{{--                                                                                    <tbody>--}}
{{--                                                                                    <tr>--}}
{{--                                                                                        <td name="tblCell" style="padding: 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">--}}
{{--                                                                                            <div style="line-height: 125%; text-align: center;">--}}
{{--                                                                <span style="font-size: 24px; font-family: 'Arial Black', 'Avant Garde', Arial; color: #b49e26; line-height: 125%;">--}}
{{--                                                                  <strong>Father's Day</strong>--}}
{{--                                                                </span>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </td>--}}
{{--                                                                                    </tr>--}}
{{--                                                                                    </tbody>--}}
{{--                                                                                </table>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_1" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="bmeImage" style="padding: 15px 20px; border-collapse: collapse;" align="center">--}}
{{--                                                                                <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/Divider.png" style="max-width: 1120px; display: block; width: 560px;" alt="" width="560" border="0">--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_11" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="bmeImage" style="border-collapse: collapse; padding: 20px 0px;" align="center">--}}
{{--                                                                                <img src="https://www.benchmarkemail.com/images/templates_n/new_editor/Templates/Moustache/Header.jpg" style="max-width: 1200px; display: block; width: 600px;" alt="" width="600" border="0">--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_12" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_divider" style="" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="tblCellMain" style="padding: 10px 20px;">--}}
{{--                                                                    <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td>--}}
{{--                                                                                <span></span>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(232, 228, 201);" width="100%" valign="top" bgcolor="#e8e4c9" align="center">--}}
{{--                                                    <div id="dv_14" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_divider" style="" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="tblCellMain" style="padding: 10px 20px;">--}}
{{--                                                                    <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td>--}}
{{--                                                                                <span></span>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_13" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="tdPart" valign="top" align="center">--}}
{{--                                                                                <table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left">--}}
{{--                                                                                    <tbody>--}}
{{--                                                                                    <tr>--}}
{{--                                                                                        <td name="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">--}}
{{--                                                                                            <div style="line-height: 125%; text-align: center;">--}}
{{--                                                                                                <span style="font-size: 30px; font-family: Georgia, Palatino; color: #393105; line-height: 125%;">Anyone can be a father but it takes someone special to be a dad.</span>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </td>--}}
{{--                                                                                    </tr>--}}
{{--                                                                                    </tbody>--}}
{{--                                                                                </table>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_15" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>--}}
{{--                                                                    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td class="tdPart" style="background-color: rgb(248, 246, 232);" valign="top" align="center">--}}
{{--                                                                                <table name="tblText" style="float: left; background-color: rgb(248, 246, 232);" width="600" cellspacing="0" cellpadding="0" border="0" align="left">--}}
{{--                                                                                    <tbody>--}}
{{--                                                                                    <tr>--}}
{{--                                                                                        <td name="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">--}}
{{--                                                                                            <div style="line-height: 200%; text-align: center;">--}}
{{--                                                                                                <span style="font-size: 16px; font-family: Georgia, Palatino; color: #666666; line-height: 200%;">You know how when something totally awesome happens during your day and you cannot wait to share the story with a significant other, family or friends? You rush home or dial as fast as you can and it's the first thing that's blurted out of your mouth after pleasantries. This section is that story.</span>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </td>--}}
{{--                                                                                    </tr>--}}
{{--                                                                                    <tr>--}}
{{--                                                                                        <td style="  background-color: rgb(248, 246, 232); padding:0px 50px 30px 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: #383838; text-align: left;" name="tblCell" valign="top" align="left">--}}
{{--                                                                                            <div class="float-right" style="line-height: 200%;">--}}
{{--                                                                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 200%; color: rgb(56, 56, 56); ">Susie Banchon</span>--}}
{{--                                                                                                <br>--}}
{{--                                                                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 200%; color: rgb(56, 56, 56); ">CEO, Fun Co.</span>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </td>--}}
{{--                                                                                    </tr>--}}
{{--                                                                                    </tbody>--}}
{{--                                                                                </table>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="dv_4" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_divider" style="" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="tblCellMain" style="padding: 20px;">--}}
{{--                                                                    <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td>--}}
{{--                                                                                <span></span>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="blk_container bmeHolder" name="bmePreFooter" style="border: 0px none transparent; background-color: rgb(245, 245, 245);" width="100%" valign="top" bgcolor="#f5f5f5" align="center">--}}
{{--                                                    <div id="dv_5" class="blk_wrapper">--}}
{{--                                                        <table class="blk" name="blk_divider" style="" width="600" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                            <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td class="tblCellMain" style="padding: 20px;">--}}
{{--                                                                    <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">--}}
{{--                                                                        <tbody>--}}
{{--                                                                        <tr>--}}
{{--                                                                            <td>--}}
{{--                                                                                <span></span>--}}
{{--                                                                            </td>--}}
{{--                                                                        </tr>--}}
{{--                                                                        </tbody>--}}
{{--                                                                    </table>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            </tbody>--}}
{{--                                                        </table>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}
</div>
