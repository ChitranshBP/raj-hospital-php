<!-- Custom Code Injected in Head -->
<meta name="google-site-verification" content="68gERuOjtmX4ai5qH8foc1K5VnPkurMVPF6avntlnLc" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-EETLNH2YGP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EETLNH2YGP');
</script>

<!-- Usermaven Tracking -->
<script type="text/javascript">
    (function () {
        window.usermaven = window.usermaven || (function () { (window.usermavenQ = window.usermavenQ || []).push(arguments); })
        var t = document.createElement('script'),
            s = document.getElementsByTagName('script')[0];
        t.defer = true;
        t.id = 'um-tracker';
        t.setAttribute('data-tracking-host', "https://events.usermaven.com")
        t.setAttribute('data-key', 'UMsCCA98cX');
        t.setAttribute('data-autocapture', 'true');
        t.setAttribute('data-form-tracking', 'all');
        t.src = 'https://t.usermaven.com/lib.js';
        s.parentNode.insertBefore(t, s);
    })();
</script>

<?php
// Google AdSense code - Only available in the 'blog' folder pages
if (
    (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/blog') !== false) ||
    (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], '/blog') !== false)
) {
?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4910239000711715"
     crossorigin="anonymous"></script>
<?php
}
?>