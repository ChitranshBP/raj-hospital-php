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

<?php
// Google AdSense code - Only available in the 'blog' folder pages
if (
    (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) ||
    (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], '/blog/') !== false)
) {
?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4910239000711715"
     crossorigin="anonymous"></script>
<?php
}
?>