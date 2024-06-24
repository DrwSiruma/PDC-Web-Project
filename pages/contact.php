<?php
include('header.php');
session_start()
?>
    <!-- ======= Send Email Section ======= -->
    <section id="send-email" class="send-email">
        <div class="container">

            <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
                <h3>Contact Us</h3>
                <p> We'd love to hear from you! Whether you have questions, feedback, or need assistance, our team at Panda Development Corporation is here to help. Reach out to us through our main office at Building 2-A, Philcrest Compound, Km. 23, West Service Road, Bo. Cupang, Muntinlupa City. You can also contact us via phone, email or filling up the form below. Connect with us today and let us assist you with your needs.</p>
            </div>
            <div class="col-lg-3 send-btn-container text-center">
                <a href="mailto:pandadevtcorp@yahoo.com" class="send-btn align-middle">Send Email</a>
            </div>
            </div>

        </div>
    </section>
    <!-- ======= End Send Email Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="row">
            <div class="col-md-7">
                <div class="ps-5 pe-5">
                    <div class="contact-card">
                        <h2>Contact Us</h2>
                        <p>Please fill up this form and provide correct details together with your concerns.</p>
                        <?php if (isset($_SESSION['feedback-error'])) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['feedback-error']; unset($_SESSION['feedback-error']); ?></div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['feedback-success'])) : ?>
                            <div class="alert alert-success"><?php echo $_SESSION['feedback-success']; unset($_SESSION['message-success']); ?></div>
                        <?php endif; ?>
                        <form action="feedback_process.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder=""></textarea>
                            </div>
                            <button type="submit" class="btn-submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 help-section">
                <div class="ps-4 pe-4">
                    <h2>Need Help?</h2>
                    <p>Call us at:</p>
                    <p>+63630468037<br>+63244157642</p>
                    <p>Email at:</p>
                    <p>email@sample.com<br>email2@sample.com</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Contact Section ======= -->
<?php include('footer.php'); ?>