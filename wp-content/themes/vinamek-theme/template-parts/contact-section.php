<?php
/**
 * Template Part: Contact Section
 * Usage: get_template_part('template-parts/contact/contact-section');
 */

$google_maps_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.2135327593674!2d106.37011987586945!3d20.8634417934351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31358f63b79e15eb%3A0xf0d6151e75a3719d!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8ahIMSRaeG7h24gVklOQU1FSw!5e0!3m2!1svi!2s!4v1761216597739!5m2!1svi!2s"; 
?>

<section class="contact-section">

        <div class="contact-row" style="display:flex; flex-wrap:wrap; gap:30px;">
            
            <div class="contact-map" style="flex:1; min-width:300px;">
                <iframe 
                    src="<?php echo esc_url($google_maps_url); ?>" 
                    width="100%" height="450" style="border:0;" 
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="contact-form-wrapper" style="flex:1; min-width:300px;">
                <h2>Contact us</h2>
                <?php
                echo do_shortcode('[contact-form-7 id="123" title="Contact form 1"]');
                ?>
                <div class="contact-social-links" style="margin-top:20px;">
                    <h4>OUR SOCIALS LINKS</h4>
                    <div class="social-icons" style="display:flex; gap:10px;">
                        <a href="#" class="social-facebook">Facebook</a>
                        <a href="#" class="social-twitter">Twitter</a>
                        <a href="#" class="social-google">Google+</a>
                        <a href="#" class="social-instagram">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
</section>

<style>
.contact-section h2 { margin-bottom:20px; }
.contact-section .wpcf7-form input,
.contact-section .wpcf7-form textarea {
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border:1px solid #ddd;
}
.contact-section .wpcf7-form input[type="submit"] {
    background:#00bfff;
    color:#fff;
    border:none;
    cursor:pointer;
    padding:12px 20px;
}
.contact-section .contact-social-links h4 {
    margin-bottom:10px;
}
.contact-section .social-icons a {
    display:inline-block;
    padding:10px;
    background:#00bfff;
    color:#fff;
    text-decoration:none;
    border-radius:4px;
}
</style>
