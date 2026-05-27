<div class="page-footer">
    <div class="page-footer-inner"> <?=date('Y'); ?> &copy; <a target="_blank" href="http://healthclaimsforum.net">HCF</a><br>
        <!-- SSL Comodo Trust Logo -->
       <!-- <script language="JavaScript" type="text/javascript">
        TrustLogo("https://app-hcf.co.uk/hide/newdesign4/img/positivessl_trust_seal_lg_222x54.png", "CL1", "none");
        </script>-->
    <!--    <script type="text/javascript"> //<![CDATA[
        var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
            document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
        //]]>
        </script>
        <script language="JavaScript" type="text/javascript">
        TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
        </script>
        -->
        <!--/SSL trust logo -->        
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        // alert(window.location.pathname);
        $('.page-sidebar-menu a').each(function(){
            if($(this).attr('href') == window.location.pathname){
                // alert('found');
                $(this).parents('li').addClass('active open');
            }
        })
    });
</script>