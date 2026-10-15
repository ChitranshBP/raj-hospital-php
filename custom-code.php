<!-- Custom Code Injected in Head -->
<meta name="google-site-verification" content="68gERuOjtmX4ai5qH8foc1K5VnPkurMVPF6avntlnLc" />

<!-- Google reCAPTCHA Enterprise -->
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LeYl7otAAAAAI9TQ4jDR4YP3ypsgI6-y58yS9aG"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var siteKey = '6LeYl7otAAAAAI9TQ4jDR4YP3ypsgI6-y58yS9aG';

    document.querySelectorAll('form').forEach(function(form) {
        if (form.id === 'homepage-search-form') return;

        var captchaInput = form.querySelector('input[name="g-recaptcha-response"]');
        if (!captchaInput) {
            captchaInput = document.createElement('input');
            captchaInput.type = 'hidden';
            captchaInput.name = 'g-recaptcha-response';
            form.appendChild(captchaInput);
        }

        form.addEventListener('submit', function(e) {
            if (form.dataset.recaptchaSubmitting === 'true') {
                return;
            }
            e.preventDefault();

            function submitForm(token) {
                if (token) {
                    captchaInput.value = token;
                }
                form.dataset.recaptchaSubmitting = 'true';
                form.submit();
            }

            if (typeof grecaptcha !== 'undefined') {
                if (grecaptcha.enterprise && typeof grecaptcha.enterprise.ready === 'function') {
                    grecaptcha.enterprise.ready(function() {
                        grecaptcha.enterprise.execute(siteKey, {action: 'submit'}).then(function(token) {
                            submitForm(token);
                        }).catch(function(err) {
                            console.error('reCAPTCHA Enterprise execution error:', err);
                            submitForm('');
                        });
                    });
                } else if (typeof grecaptcha.ready === 'function') {
                    grecaptcha.ready(function() {
                        grecaptcha.execute(siteKey, {action: 'submit'}).then(function(token) {
                            submitForm(token);
                        }).catch(function(err) {
                            console.error('reCAPTCHA execution error:', err);
                            submitForm('');
                        });
                    });
                } else {
                    submitForm('');
                }
            } else {
                submitForm('');
            }
        });
    });
});
</script>

<?php
// Google AdSense is only offered on the 'blog' folder pages
$raj_is_blog_page =
    (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/blog') !== false) ||
    (isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], '/blog') !== false);
?>
<!-- Privacy consent (DPDP Act 2023): Google Analytics, Usermaven and Google AdSense load only
     after the visitor opts in. The choice is kept in this browser (localStorage key
     raj_privacy_consent) and can be changed or withdrawn from "Cookie Settings" in the footer.
     Bump NOTICE_VERSION whenever the purposes or vendors below change, so visitors are asked again. -->
<script>
(function () {
    var NOTICE_VERSION = '2026-10-15';
    var STORAGE_KEY = 'raj_privacy_consent';
    var PRIVACY_URL = '/privacy-policy.php';
    var IS_BLOG = <?php echo $raj_is_blog_page ? 'true' : 'false'; ?>;
    var loaded = {};

    function readConsent() {
        try {
            var c = JSON.parse(window.localStorage.getItem(STORAGE_KEY) || 'null');
            return c && c.v === NOTICE_VERSION ? c : null;
        } catch (e) {
            return null;
        }
    }

    function saveConsent(analytics, ads) {
        var c = { v: NOTICE_VERSION, analytics: !!analytics, ads: !!ads, ts: new Date().toISOString() };
        try {
            window.localStorage.setItem(STORAGE_KEY, JSON.stringify(c));
        } catch (e) {}
        return c;
    }

    function addScript(src, attrs) {
        var t = document.createElement('script');
        t.async = true;
        t.src = src;
        for (var k in attrs || {}) {
            t.setAttribute(k, attrs[k]);
        }
        document.head.appendChild(t);
        return t;
    }

    // Google tag (gtag.js)
    function loadGoogleAnalytics() {
        if (loaded.ga) return;
        loaded.ga = true;
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { dataLayer.push(arguments); };
        gtag('js', new Date());
        gtag('config', 'G-EETLNH2YGP');
        addScript('https://www.googletagmanager.com/gtag/js?id=G-EETLNH2YGP');
    }

    // Usermaven Tracking. Form tracking is off so that what visitors type into
    // appointment/enquiry forms (names, phone numbers, health details) is not sent to analytics.
    function loadUsermaven() {
        if (loaded.um) return;
        loaded.um = true;
        window.usermaven = window.usermaven || (function () { (window.usermavenQ = window.usermavenQ || []).push(arguments); });
        var t = document.createElement('script'),
            s = document.getElementsByTagName('script')[0];
        t.defer = true;
        t.id = 'um-tracker';
        t.setAttribute('data-tracking-host', "https://events.usermaven.com");
        t.setAttribute('data-key', 'UMsCCA98cX');
        t.setAttribute('data-autocapture', 'true');
        t.setAttribute('data-form-tracking', 'none');
        t.src = 'https://t.usermaven.com/lib.js';
        s.parentNode.insertBefore(t, s);
    }

    function loadAdSense() {
        if (loaded.ads || !IS_BLOG) return;
        loaded.ads = true;
        addScript('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4910239000711715', { crossorigin: 'anonymous' });
    }

    function apply(c) {
        if (!c) return;
        if (c.analytics) {
            loadGoogleAnalytics();
            loadUsermaven();
        }
        if (c.ads) {
            loadAdSense();
        }
    }

    // Remove first-party cookies set by the optional vendors when consent is withdrawn.
    function clearOptionalCookies() {
        var prefixes = ['_ga', '_gid', '_gat', '_gcl', '__eventn', '__um', 'um_', '__gads', '__gpi', '__gsas', 'FCNEC'];
        var host = window.location.hostname;
        var domains = ['', host, '.' + host, '.' + host.replace(/^www\./, '')];
        document.cookie.split(';').forEach(function (part) {
            var name = part.split('=')[0].trim();
            if (!prefixes.some(function (p) { return name.indexOf(p) === 0; })) return;
            domains.forEach(function (d) {
                document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/' + (d ? '; domain=' + d : '');
            });
        });
    }

    function save(analytics, ads) {
        var before = readConsent();
        var c = saveConsent(analytics, ads);
        closePanel();
        var withdrawn = before && ((before.analytics && !c.analytics) || (before.ads && !c.ads));
        if (withdrawn) {
            clearOptionalCookies();
            window.location.reload();
            return;
        }
        apply(c);
    }

    var panel = null;

    function closePanel() {
        if (panel && panel.parentNode) panel.parentNode.removeChild(panel);
        panel = null;
    }

    function button(label, primary) {
        var b = document.createElement('button');
        b.type = 'button';
        b.textContent = label;
        b.style.cssText = 'flex:1 1 auto;min-width:8.5rem;padding:0.6rem 1rem;border-radius:0.5rem;font-weight:600;font-size:0.875rem;cursor:pointer;border:1px solid ' +
            (primary ? '#ea5234;background:#ea5234;color:#ffffff;' : '#374151;background:#374151;color:#ffffff;');
        return b;
    }

    function toggle(id, title, text, checked) {
        var row = document.createElement('label');
        row.setAttribute('for', id);
        row.style.cssText = 'display:flex;gap:0.6rem;align-items:flex-start;margin:0.5rem 0;cursor:pointer;';
        var box = document.createElement('input');
        box.type = 'checkbox';
        box.id = id;
        box.checked = !!checked;
        box.style.cssText = 'margin-top:0.2rem;width:1rem;height:1rem;flex:none;accent-color:#ea5234;';
        var span = document.createElement('span');
        span.innerHTML = '<strong style="color:#111827;">' + title + '</strong><br><span style="color:#4b5563;">' + text + '</span>';
        row.appendChild(box);
        row.appendChild(span);
        return row;
    }

    function openPanel(showChoices) {
        closePanel();
        var current = readConsent();
        panel = document.createElement('div');
        panel.id = 'raj-privacy-consent';
        panel.setAttribute('role', 'dialog');
        panel.setAttribute('aria-live', 'polite');
        panel.setAttribute('aria-label', 'Privacy choices');
        panel.style.cssText = 'position:fixed;left:16px;right:16px;bottom:16px;z-index:2147483000;max-width:640px;margin:0 auto;background:#ffffff;color:#374151;' +
            'border:1px solid #e5e7eb;border-radius:0.75rem;box-shadow:0 10px 30px rgba(0,0,0,0.2);padding:1rem 1.1rem;font-size:0.875rem;line-height:1.5;';

        var heading = document.createElement('p');
        heading.style.cssText = 'font-weight:700;font-size:1rem;color:#111827;margin:0 0 0.35rem;';
        heading.textContent = 'Your privacy choices';
        panel.appendChild(heading);

        var intro = document.createElement('p');
        intro.style.cssText = 'margin:0 0 0.5rem;';
        intro.innerHTML = 'We use essential storage to run this website and remember this choice. With your permission we would also use ' +
            '<strong>analytics</strong> (Google Analytics, Usermaven) to understand how the site is used, and ' +
            '<strong>advertising</strong> (Google AdSense) on blog pages, which may use cookies to choose and measure ads' +
            '. Nothing optional is switched on unless you agree. You can change or withdraw your choice at any time from &ldquo;Cookie Settings&rdquo; at the bottom of every page. ' +
            '<a href="' + PRIVACY_URL + '" style="color:#ea5234;text-decoration:underline;">Read our Privacy Notice</a>.';
        panel.appendChild(intro);

        var choices = document.createElement('div');
        choices.style.display = showChoices ? 'block' : 'none';
        choices.appendChild(toggle('raj-consent-analytics', 'Analytics', 'Pages visited, device and browser type, approximate location from your IP address, and clicks on this site.', current && current.analytics));
        choices.appendChild(toggle('raj-consent-ads', 'Advertising (blog pages)', 'Google AdSense may use cookies to choose and measure the ads shown on blog pages.', current && current.ads));
        panel.appendChild(choices);

        var actions = document.createElement('div');
        actions.style.cssText = 'display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.75rem;';
        var reject = button('Reject all', false);
        var accept = button('Accept all', true);
        var manage = document.createElement('button');
        manage.type = 'button';
        manage.textContent = showChoices ? 'Save my choices' : 'Choose';
        manage.style.cssText = 'flex:1 1 auto;min-width:8.5rem;padding:0.6rem 1rem;border-radius:0.5rem;font-weight:600;font-size:0.875rem;cursor:pointer;background:#ffffff;color:#111827;border:1px solid #d1d5db;';
        reject.addEventListener('click', function () { save(false, false); });
        accept.addEventListener('click', function () { save(true, true); });
        manage.addEventListener('click', function () {
            if (choices.style.display === 'none') {
                choices.style.display = 'block';
                manage.textContent = 'Save my choices';
                return;
            }
            save(document.getElementById('raj-consent-analytics').checked, document.getElementById('raj-consent-ads').checked);
        });
        actions.appendChild(reject);
        actions.appendChild(accept);
        actions.appendChild(manage);
        panel.appendChild(actions);

        document.body.appendChild(panel);
    }

    window.RajConsent = {
        open: function () { openPanel(true); },
        get: readConsent
    };

    var existing = readConsent();
    apply(existing);
    if (!existing) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () { openPanel(false); });
        } else {
            openPanel(false);
        }
    }
})();
</script>
