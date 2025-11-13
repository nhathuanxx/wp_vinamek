<?php

/**
 * Template Part: Contact Section
 * Usage: get_template_part('template-parts/contact/contact-section');
 */
$lang = pll_current_language('slug');
$google_maps_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.2135327593674!2d106.37011987586945!3d20.8634417934351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31358f63b79e15eb%3A0xf0d6151e75a3719d!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8ahIMSRaeG7h24gVklOQU1FSw!5e0!3m2!1svi!2s!4v1761216597739!5m2!1svi!2s";
?>


<section class="contact-section">
    <div style="text-align:center; margin-bottom:40px;">
        <h2><?php echo ($lang === 'vi') ? 'Liên hệ với chúng tôi' : 'Contact us'; ?>
        </h2>
    </div>
    <div class="contact-row" style="display:flex; flex-wrap:wrap; gap:30px;">

        <div class="contact-map" style="flex:1; min-width:300px;">
            <iframe
                src="<?php echo esc_url($google_maps_url); ?>"
                width="100%" height="450" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="vina-contact-form-wrapper" style="flex:1; min-width:300px;">
            <?php
            if ($lang === 'vi') {
                echo do_shortcode('[contact-form-7 id="cbe6e5b" title="Liên hệ"]');
            } else {
                echo do_shortcode('[contact-form-7 id="9fcdf73" title="Liên hệ (en)"]');
            }
            ?>
            <!-- <div class="contact-social-links" style="margin-top:20px;">
                    <h4>OUR SOCIALS LINKS</h4>
                    <div class="social-icons" style="display:flex; gap:10px;">
                        <a href="#" class="social-facebook">Facebook</a>
                        <a href="#" class="social-twitter">Twitter</a>
                        <a href="#" class="social-google">Google+</a>
                        <a href="#" class="social-instagram">Instagram</a>
                    </div>
                </div> -->
        </div>
    </div>
</section>

<style>
    .contact-section h2 {
        margin-bottom: 28px;
    }

    .contact-section .wpcf7-form input,
    .contact-section .wpcf7-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
    }

    .contact-section .wpcf7-form input[type="submit"] {
        background: #00bfff;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 12px 20px;
    }

    .contact-section .contact-social-links h4 {
        margin-bottom: 10px;
    }

    .contact-section .social-icons a {
        display: inline-block;
        padding: 10px;
        background: #00bfff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
</style>
<style>
    .contact-form-wrapper {
        max-width: 600px;
        margin: 0 auto;
        padding: 25px;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        font-family: 'Helvetica Neue', Arial, sans-serif;
    }

    .contact-form-wrapper label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333333;
    }

    .contact-form-wrapper .input-text,
    .contact-form-wrapper .textarea-text {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .contact-form-wrapper .input-text:focus,
    .contact-form-wrapper .textarea-text:focus {
        border-color: #007BFF;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        outline: none;
    }

    .contact-form-wrapper .textarea-text {
        min-height: 140px;
        resize: vertical;
    }

    .contact-form-wrapper .btn-submit {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact-form-wrapper .btn-submit:hover {
        background-color: #0056b3;
    }

    .contact-map iframe {
        height: 100%;
    }
</style>